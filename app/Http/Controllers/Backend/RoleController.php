<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Role\CreateRoleRequest;
use App\Http\Requests\Backend\Role\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Role::class, 'role');

    }

    public function index()
    {
        $roles = Role::select('id','name')->with('permissions')->withCount('users')->paginate('10');
        return view('backend.pages.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = config('custom.app_permissions');

        $permissionsRows = array_chunk($permissions, 20);
        return view('backend.pages.roles.create', compact('permissionsRows'));
    }
 
    public function store(CreateRoleRequest $request)
    {
            $role = Role::create(['name' => $request->name]);
            $role->syncPermissions($request->permissions);
            toast()->success('Successed','Role Created Successfully');
            return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $permissions = config('custom.app_permissions');
        $permissionsRows = array_chunk($permissions, 20);
        $userPermissions = $role->permissions()->pluck('name')->toArray();
        return view('backend.pages.roles.edit', compact('role','permissionsRows', 'userPermissions'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
            $role->syncPermissions($request->permissions);
            toast()->success('Successed','Role Updated Successfully');
            return back();
    }

    public function destroy(Role $role)
    {
        if($role->users->count() > 0){
            toast()->error('Error','Role Can Not Be Deleted Because It Has Users');
            return back();
        }

        $role->delete();
        toast()->success('Successed','Role Deleted Successfully');
        return back();
    }
}
