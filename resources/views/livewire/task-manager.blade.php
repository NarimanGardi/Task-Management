<div>
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
            <tbody wire:sortable="updateTaskOrder">
                @foreach ($tasks as $task)
                    <tr wire:sortable.item="{{ $task->id }}" wire:key="task-{{ $task->id }}">
                        <td><strong>{{ $task->name }}</strong></td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $task->start_date->format('d M Y') }}</td>
                        <td>{{ $task->due_date->format('d M Y') }}</td>
                        <td><span class="badge bg-label-primary me-1">{{ $task->priority }}</span></td>
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
                                <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @can('edit-task')
                                        <a class="dropdown-item" href="{{ route('tasks.edit', $task->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                    @endcan
                                    @can('delete-task')
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item show_confirm">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
