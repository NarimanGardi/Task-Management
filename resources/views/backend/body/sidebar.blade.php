<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('dashboard') }}" class="sidebar-brand">
            Lara<span>vel</span>
        </a>
        <div class="sidebar-toggler active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>

            @can('manage-user')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="user"></i>
                        <span class="link-title">Users</span>
                    </a>
                </li>
            @endcan

            @can('manage-role')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="unlock"></i>
                        <span class="link-title">Roles & Permissions</span>
                    </a>
                </li>
            @endcan

            @can('manage-group')
                <li class="nav-item">
                    <a href="{{ route('groups.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="users"></i>
                        <span class="link-title">Groups</span>
                    </a>
                </li>
            @endcan

            @can('manage-project')
                <li class="nav-item">
                    <a href="{{ route('projects.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="package"></i>
                        <span class="link-title">Projects</span>
                    </a>
                </li>
            @endcan

            @can('manage-task')
                <li class="nav-item">
                    <a href="{{ route('tasks.index') }}" class="nav-link">
                        <i class="link-icon" data-feather="check-square"></i>
                        <span class="link-title">Tasks</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</nav>
