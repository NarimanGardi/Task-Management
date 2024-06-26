<?php

namespace App\Http\Controllers\Backend;

use App\Models\Project;
use App\Enums\ProjectStatusEnum;
use App\Enums\ProjectPriorityEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Project\CreateProjectRequest;
use App\Http\Requests\Backend\Project\UpdateProjectRequest;

class ProjectController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Project::class, 'project');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::with('tasks')->latest()->paginate();
        return view('backend.pages.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $statuses = ProjectStatusEnum::cases();
        $priorities = ProjectPriorityEnum::cases();

        return view('backend.pages.projects.create', compact('statuses', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateProjectRequest $request)
    {
        Project::create($request->validated());
        toast()->success('Successed', 'Project Created Successfully');
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $statuses = ProjectStatusEnum::cases();
        $priorities = ProjectPriorityEnum::cases();

        return view('backend.pages.projects.edit', compact('project', 'statuses', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $project->update($request->validated());
        toast()->success('Successed', 'Project Updated Successfully');
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        toast()->success('Successed', 'Project Deleted Successfully');
        return back();
    }

    public function projectTasks(Project $project)
    {
        $projects = Project::select('id', 'title')->get();
        $tasks = $project->tasks()->with(['users','groups'])->orderBy('sort_order')->get();
        return view('backend.pages.projects.tasks', compact('project', 'tasks', 'projects'));
    }
}
