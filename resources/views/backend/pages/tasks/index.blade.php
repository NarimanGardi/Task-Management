@extends('backend.app')
@section('title', __('Manage Tasks'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Manage Tasks</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @can('create-task')
                    <a href="{{ route('tasks.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Create New Task
                    </a>
                @endcan
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Task Table</h5>
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
                                        <td>{{ $task->project?->title }}</td>
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
                                                    <a class="dropdown-item" href="{{ route('projects.tasks', $task->project?->id) }}">
                                                        <i class="bx bx-sort me-1"></i> Sort Tasks
                                                    </a>
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
                    <div class="m-3">
                        {{ $tasks->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
