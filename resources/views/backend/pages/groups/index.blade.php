@extends('backend.app')
@section('title', __('Manage Group'))
@section('content')
    <div class="page-content">
        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Manage Groups</h4>
            </div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <a href="{{ route('groups.create') }}" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                    <i class="btn-icon-prepend" data-feather="plus"></i>
                    Create New Group
                </a>
            </div>
        </div>
        <div class="row g-4">
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">Groups Table</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Members</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($groups as $group)
                                    <tr>
                                        <td><strong>{{ $group->name }}</strong></td>
                                        <td>
                                            @forelse($group->users as $user)
                                                <span class="badge bg-label-primary me-1 ">
                                                    {{ $user->name }}
                                                </span>
                                            @empty
                                                <span class="badge bg-label-danger me-1 ">
                                                    No Member
                                                </span>
                                            @endforelse
                                        </td>
                                        <td>{{ $group->created_at->format('d M Y') }}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 " data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('groups.edit', $group->id) }}"><i
                                                            class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <form action="{{ route('groups.destroy', $group->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item show_confirm"><i
                                                                class="bx bx-trash me-1"></i> Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No Group Found</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="m-3">
                        {{ $groups->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
