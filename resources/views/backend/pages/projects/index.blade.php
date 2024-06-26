@extends('backend.app')
@section('title', __('Manage Projects'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Manage Projects</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                @can('create-project')
                    <a href="{{ route('projects.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                        <i class="btn-icon-prepend" data-feather="plus"></i>
                        Create New Project
                    </a>
                @endcan
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Project Table</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Tasks</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($projects as $project)
                                    <tr>
                                        <td><strong>{{ $project->title }}</strong></td>
                                        <td>{{ $project->description }}</td>
                                        <td>{{ $project->start_date->format('d M Y') }}</td>
                                        <td>{{ $project->end_date->format('d M Y') }}</td>
                                        <td><a href="{{ route('projects.tasks',$project->id) }}"><span class="badge bg-label-secondary me-1 "> {{ $project->tasks?->count() }} <i
                                            class="bx bx-show me-1"></i> View </span></a>
                                        </td>
                                        <td> <span class="badge bg-label-primary me-1 "> {{ $project->priority }} </span>
                                        </td>
                                        <td> <span class="badge bg-label-info me-1 "> {{ $project->status }} </span> </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    @can('edit-project')
                                                        <a class="dropdown-item"
                                                            href="{{ route('projects.edit', $project->id) }}"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    @endcan
                                                    @can('delete-project')
                                                        <form action="{{ route('projects.destroy', $project->id) }}"
                                                            method="post">
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
                                        <td colspan="7" class="text-center">No Project Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="m-3">
                        {{ $projects->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
