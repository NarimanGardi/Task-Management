<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\CreateGroupRequest;
use App\Http\Requests\Group\UpdateGroupRequest;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $groups = Group::with('users')->latest()->paginate(10);
        return view('backend.pages.groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        return view('backend.pages.groups.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateGroupRequest $request)
    {
        $group = Group::create([
            'name' => $request->name,
        ]);

        if ($request->users) {
            $group->users()->attach($request->users);
        }

        toast()->success('Successed', 'Group Created Successfully');
        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        $group->loadMissing('users');
        $users = User::select('id', 'name')->get();
        return view('backend.pages.groups.edit', compact('group', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(UpdateGroupRequest $request, Group $group)
    {

        $group->update([
            'name' => $request->name,
        ]);

        if ($request->users) {
            $group->users()->sync($request->users);
        }

        toast()->success('Successed', 'Group Updated Successfully');
        return redirect()->route('groups.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        $group->delete();
        toast('Group deleted successfully', 'success');
        return back();
    }
}
