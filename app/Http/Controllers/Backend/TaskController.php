<?php

namespace App\Http\Controllers\Backend;

use App\Models\Task;
use App\Models\User;
use App\Models\Group;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Enums\TaskPriorityEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Task\CreateTaskRequest;
use App\Http\Requests\Backend\Task\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['project', 'users','groups'])->latest()->paginate();
        return view('backend.pages.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        $groups = Group::select('id', 'name')->get();
        $projects = Project::select('id', 'title')->get();
        $priorities = TaskPriorityEnum::cases();

        return view('backend.pages.tasks.create', compact('users', 'groups', 'projects', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTaskRequest $request)
    {
        $taskData = $request->except(['users', 'groups']);

        $maxSortOrder = Task::where('project_id', $taskData['project_id'])->max('sort_order');
        $taskData['sort_order'] = $maxSortOrder + 1;
        $task = Task::create($taskData);

        if ($request->has('users') && $request->input('users')) {
            $task->users()->attach($request->input('users'));
        }

        if ($request->has('groups') && $request->input('groups')) {
            $task->groups()->attach($request->input('groups'));
        }

        toast()->success('Successed','Task Created Successfully');
        return redirect()->route('projects.tasks', $task->project_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::select('id', 'name')->get();
        $groups = Group::select('id', 'name')->get();
        $projects = Project::select('id', 'title')->get();
        $priorities = TaskPriorityEnum::cases();

        return view('backend.pages.tasks.edit', compact('task', 'users', 'groups', 'projects', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $taskData = $request->except(['users', 'groups']);

        $task->update($taskData);

        if($request->has('users') && $request->input('users')) {
            $task->users()->sync($request->input('users'));
        }
        else {
            $task->users()->detach();
        }

        if($request->has('groups') && $request->input('groups')) {
            $task->groups()->sync($request->input('groups'));
        }
        else {
            $task->groups()->detach();
        }

        toast()->success('Successed','Task Updated Successfully');
        return redirect()->route('projects.tasks', $task->project_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->users()->detach();
        $task->groups()->detach();
        $task->delete();

        toast()->success('Successed','Task Deleted Successfully');
        return redirect()->route('projects.tasks', $task->project_id);
    }
}
