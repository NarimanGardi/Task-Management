@extends('backend.app')
@section('title', __('Create Project'))
@section('content')
    <!-- Content wrapper -->
    <div class="page-content">
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Create New Project</span></h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('projects.store') }}">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="title" class="form-label">Title</label>
                                        <input class="form-control" type="text" id="title" name="title" autofocus
                                            value="{{ old('title') }}" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="mb-3 col-md-4">
                                        <label for="start_date" class="form-label">Start Date</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="start_date" value="{{ old('start_date') }}">
                                        </div>
                                    </div>

                                    <div class="mb-3 col-md-4">
                                        <label for="amount" class="form-label">End Date</label>
                                        <div class="input-group date me-2 mb-2 mb-md-0" id="datePickerExample1">
                                            <span
                                                class="input-group-text input-group-addon bg-transparent border-primary"><i
                                                    data-feather="calendar" class=" text-primary"></i></span>
                                            <input type="text" class="form-control border-primary bg-transparent"
                                                name="end_date" value="{{ old('end_date') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-control" id="status" name="status">
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status->value }}">
                                                    {{ $status->value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-4">
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
