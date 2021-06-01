<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item @if(Request::is('admin/dashboard')) active @endif ">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('admin-users')) active @endif">
            <a class="nav-link" href="{{ route('admin-users.index') }}">
                <i class="material-icons">person</i>
                <p>Users</p>
            </a>
        </li>

    </ul>
</div>