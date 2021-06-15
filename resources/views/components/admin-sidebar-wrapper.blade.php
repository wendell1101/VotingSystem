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
                <i class="material-icons"><i class="fas fa-users"></i></i>
                <p>Users</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('positions')) active @endif">
            <a class="nav-link" href="{{ route('positions.index') }}">
                <i class="material-icons">person</i>
                <p>User Roles</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('partylists')) active @endif">
            <a class="nav-link" href="{{ route('partylists.index') }}">
                <i class="material-icons"><i class="fas fa-tasks"></i></i>
                <p>Partylists</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('officers')) active @endif">
            <a class="nav-link" href="{{ route('officers.index') }}">
                <i class="material-icons"><i class="fas fa-tasks"></i></i>
                <p>Candidate Officers</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('candidates')) active @endif">
            <a class="nav-link" href="{{ route('candidates.index') }}">
                <i class="material-icons"><img src="{{ asset('img/main/candidate_icon.svg') }}" alt="icon"></i>
                <p>Candidates</p>
            </a>
        </li>
        <li class="nav-item @if(Request::is('results')) active @endif">
            <a class="nav-link" href="{{ route('results.index') }}">
                <i class="material-icons"><i class="fas fa-poll"></i></i>
                <p>Voting Results</p>
            </a>
        </li>

    </ul>
</div>