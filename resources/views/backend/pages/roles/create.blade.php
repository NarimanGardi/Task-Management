@extends('backend.app')
@section('title', __('Create Roles'))
@section('content')
<div class="page-content">
    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
        <div>
            <h4 class="mb-3 mb-md-0">Create Role</h4>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-12">
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('roles.store') }}">@csrf <div class="card mb-4">
                    <h4 class="p-3">Role Info</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-8"><label for="name" class="form-label">Name</label><input
                                    class="form-control" type="text" id="name" name="name" autofocus
                                    value="{{ old('name') }}" /></div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <h4 class="p-3">Permissions</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="permissions[]" value="manage-user"
                                            class="form-check-input" id="manage-user">
                                        <label class="form-check-label" for="manage-user">Manage User </label>
                                    </div>
                                    <div style="margin-left: 30px">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="view-user"
                                                class="form-check-input" id="read-user">
                                            <label class="form-check-label" for="read-user">Show User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="create-user"
                                                class="form-check-input" id="write-user">
                                            <label class="form-check-label" for="write-user">Add User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="edit-user"
                                                class="form-check-input" id="edit-user">
                                            <label class="form-check-label" for="edit-user">Edit User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="delete-user"
                                                class="form-check-input" id="delete-user">
                                            <label class="form-check-label" for="delete-user">Delete User </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <div class="form-check mb-2"><input type="checkbox" name="permissions[]"
                                            value="manage-role" class="form-check-input" id="manage-role"><label
                                            class="form-check-label" for="manage-role">Manage Roles </label></div>
                                    <div style="margin-left: 30px">
                                        <div class="form-check mb-2"><input type="checkbox" name="permissions[]"
                                                value="read-role" class="form-check-input" id="view-role"><label
                                                class="form-check-label" for="read-role">Show Role </label></div>
                                        <div class="form-check mb-2"><input type="checkbox" name="permissions[]"
                                                value="write-role" class="form-check-input" id="create-role"><label
                                                class="form-check-label" for="write-role">Add Role </label></div>
                                        <div class="form-check mb-2"><input type="checkbox" name="permissions[]"
                                                value="edit-role" class="form-check-input" id="edit-role"><label
                                                class="form-check-label" for="edit-role">Edit Role </label></div>
                                        <div class="form-check mb-2"><input type="checkbox" name="permissions[]"
                                                value="delete-role" class="form-check-input" id="delete-role"><label
                                                class="form-check-label" for="delete-role">Delete Role </label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"><button type="submit" class="btn btn-primary me-2">Submit</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>@endsection
