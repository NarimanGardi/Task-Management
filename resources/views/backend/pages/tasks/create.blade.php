@extends('backend.app')
@section('title', __('Create Task'))
@section('content')
    <!-- Content wrapper -->
    <div class="page-content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create New task</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('tasks.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" autofocus
                                            value="{{ old('name') }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="mb-3 col-md-6">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="start_date" value="{{ old('start_date') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="amount" class="form-label">Due Date</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="due_date" value="{{ old('due_date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Project</label>
                                        <select class="form-control" id="status" name="project_id">
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->id }}">
                                                    {{ $project->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select class="form-control" id="priority" name="priority">
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->value }}">
                                                    {{ $priority->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="users" class="form-label">Assign Users to Task</label>
                                        <select class="js-example-basic-multiple form-select" id="users" name="users[]"
                                            multiple="multiple" data-width="100%">
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="groups" class="form-label">Assign Groups to Task</label>
                                        <select class="js-example-basic-multiple form-select" id="groups" name="groups[]"
                                            multiple="multiple" data-width="100%">
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
