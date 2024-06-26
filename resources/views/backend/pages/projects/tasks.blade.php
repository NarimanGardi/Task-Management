@extends('backend.app')
@section('title', __('Manage Project Tasks'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Manage {{ $project->title }} Tasks</h4>
                <br>
                <div class="alert alert-warning mt-2" role="alert">
                    You can sort the tasks by dragging and dropping them.
                </div>
            </div>
            <div class="mt-3">
                <label for="project" class="form-label">Change the tasks by selecting a project </label>
                 <select class="js-example-basic-single form-select" id="project" name="project" onchange="location = this.value;">
                    @foreach ($projects as $selectProject)
                        <option value="{{ route('projects.tasks', $selectProject->id) }}"
                            {{ $selectProject->id == $project->id ? 'selected' : '' }}>
                            {{ $selectProject->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Project Task Table</h5>
                    @livewire('task-manager', ['project' => $project])
                </div>
            </div>
        </div>
    </div>
@endsection
