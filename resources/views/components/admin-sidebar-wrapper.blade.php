<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item @if(Request::is('admin/dashboard')) active @endif ">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('users')) active @endif">
            <a class="nav-link" href="{{ route('users.index') }}">
                <i class="material-icons">person</i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('positions')) active @endif">
            <a class="nav-link" href="{{ route('positions.index') }}">
                <i class="material-icons">person</i>
                <p>User Roles</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('officers')) active @endif">
            <a class="nav-link" href="{{ route('officers.index') }}">
                <i class="material-icons">person</i>
                <p>Candidate Officers</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('candidates')) active @endif">
            <a class="nav-link" href="{{ route('candidates.index') }}">
                <i class="material-icons">person</i>
                <p>Candidates</p>
            </a>
        </li>

    </ul>
</div>