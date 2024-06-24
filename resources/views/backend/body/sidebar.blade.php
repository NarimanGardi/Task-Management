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
            <li class="nav-item">
                <a href="{{ route('users.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="users"></i>
                    <span class="link-title">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('roles.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="unlock"></i>
                    <span class="link-title">Roles & Permissions</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<nav class="settings-sidebar">
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Default Theme:</h6>
            <a class="theme-item {{ Cache::has('default-theme') ? 'active' : '' }}" href="{{ route('default-theme') }}">
                <img src="{{ asset('backend/assets/images/screenshots/default.png') }}" alt="light theme">
            </a>
        </div>
    </div>
</nav>
