@extends('backend.app')
@section('title', __('Edit Project'))
@section('content')
    <!-- Content wrapper -->
    <div class="page-content">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Update Project</span></h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('projects.update', $project->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="title" class="form-label">Title</label>
                                        <input class="form-control" type="text" id="title" name="title" autofocus
                                            value="{{ $project->title }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-12">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ $project->description }}</textarea>
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
                                                name="start_date" value="{{ $project->start_date }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label for="amount" class="form-label">End Date</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="end_date" value="{{ $project->end_date->format('Y-m-d') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->value }}"
                                                    {{ $project->status == $status->value ? 'selected' : '' }}>
                                                    {{ $status->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label for="priority" class="form-label">Priority</label>
                                        <select class="form-control" id="priority" name="priority">
                                            @foreach ($priorities as $priority)
                                                <option value="{{ $priority->value }}"
                                                    {{ $project->priority == $priority->value ? 'selected' : '' }}>
                                                    {{ $priority->value }}
                                                </option>
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
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
