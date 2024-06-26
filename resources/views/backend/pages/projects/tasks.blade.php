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
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Project</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Priority</th>
                                    <th>Users</th>
                                    <th>Groups</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($tasks as $task)
                                    <tr>
                                        <td><strong>{{ $task->name }}</strong></td>
                                        <td>{{ $project->title }}</td>
                                        <td>{{ $task->start_date->format('d M Y') }}</td>
                                        <td>{{ $task->due_date->format('d M Y') }}</td>
                                        <td> <span class="badge bg-label-primary me-1 "> {{ $task->priority }} </span>
                                        </td>
                                        <td>
                                            @foreach ($task->users as $user)
                                                <span class="badge bg-label-info me-1">{{ $user->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($task->groups as $group)
                                                <span class="badge bg-label-success me-1">{{ $group->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    @can('edit-task')
                                                        <a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    @endcan
                                                    @can('delete-task')
                                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item show_confirm"><i
                                                                    class="bx bx-trash me-1"></i> Delete</button>
                                                        </form>
                                                    @endcan
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No task Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
