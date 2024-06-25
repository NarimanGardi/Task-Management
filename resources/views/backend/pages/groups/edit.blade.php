@extends('backend.app')
@section('title', __('Edit Group'))
@section('content')
    <!-- Content wrapper -->
    <div class="page-content">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"> Update Group</span></h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('groups.update', $group->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="mb-3 col-md-8">
                                        <label for="name" class="form-label">Name</label>
                                        <input class="form-control" type="text" id="name" name="name" autofocus
                                            value="{{ $group->name }}" />
                                    </div>
                                </div>
                                <div class="mb-3 col-md-8">
                                    <label for="users" class="form-label">Select Members</label>
                                    <select class="js-example-basic-multiple form-select" id="users" name="users[]"
                                        multiple="multiple" data-width="100%">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ in_array($user->id, $group->users->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $user->name }}</option>
                                        @endforeach
                                    </select>
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
