@extends('backend.app')
@section('title', __('Edit Roles'))
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
            <form method="POST" action="{{ route('roles.update',$role->id) }}">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <h4 class="p-3">Role Info</h4>
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-8">
                                <label class="form-label">Name</label>
                                <input class="form-control" type="text" disabled
                                    value="{{ $role->name}}" />
                            </div>
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
                                            class="form-check-input" id="manage-user"
                                            {{ in_array('manage-user',$permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="manage-user">Manage User </label>
                                    </div>
                                    <div style="margin-left: 30px">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="view-user"
                                                class="form-check-input" id="read-user"
                                                {{ in_array('view-user',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="read-user">Show User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="create-user"
                                                class="form-check-input" id="write-user"
                                                {{ in_array('create-user',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="write-user">Add User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="edit-user"
                                                class="form-check-input" id="edit-user"
                                                {{ in_array('edit-user',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="edit-user">Edit User </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="delete-user"
                                                class="form-check-input" id="delete-user"
                                                {{ in_array('delete-user',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="delete-user">Delete User </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="mb-4">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="permissions[]" value="manage-role"
                                            class="form-check-input" id="manage-role"
                                            {{ in_array('manage-role',$permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="manage-role">Manage Roles </label>
                                    </div>
                                    <div style="margin-left: 30px">
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="view-role"
                                                class="form-check-input" id="read-role"
                                                {{ in_array('view-role',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="read-role">Show Role </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="create-role"
                                                class="form-check-input" id="write-role"
                                                {{ in_array('create-role',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="write-role">Add Role </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="edit-role"
                                                class="form-check-input" id="edit-role"
                                                {{ in_array('edit-role',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="edit-role">Edit Role </label>
                                        </div>
                                        <div class="form-check mb-2">
                                            <input type="checkbox" name="permissions[]" value="delete-role"
                                                class="form-check-input" id="delete-role"
                                                {{ in_array('delete-role',$permissions) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="delete-role">Delete Role </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2"><button type="submit" class="btn btn-primary me-2">Update</button></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>@endsection
