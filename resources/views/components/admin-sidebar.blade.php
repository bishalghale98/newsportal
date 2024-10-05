<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="{{ route('dashboard') }}"> <img alt="image" src="/assets/img/logo.png" class="header-logo" />
            <span class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown {{ Request::routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="settings"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::routeIs('company*') ? 'active' : '' }}"><a class="nav-link"
                        href="{{ route('company.index') }}">Company Setup</a></li>
            </ul>
        </li>
        <li class="dropdown {{ Request::routeIs('category.index') ? 'active' : '' }} ">
            <a href="{{ route('category.index') }}" class="nav-link"><i
                    data-feather="folder"></i><span>Category</span></a>
        </li>
        <li class="dropdown {{ Request::routeIs('post.index') ? 'active' : '' }}">
            <a href="{{ route('post.index') }}" class="nav-link"><i data-feather="edit-3"></i><span>Post</span></a>
        </li>
        <li class="dropdown {{ Request::routeIs('advertise.index') ? 'active' : '' }}">
            <a href="{{ route('advertise.index') }}" class="nav-link"><i
                    data-feather="image"></i><span>Advertisement</span></a>
        </li>

        @if (Auth::user()->role == 'admin')
            <li class="dropdown {{ Request::routeIs('user.index') ? 'active' : '' }}">
                <a href="{{ route('user.index') }}" class="nav-link"><svg viewBox="0 0 24 24" width="24"
                        height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" class="css-i6dzq1">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"> </path>
                        <circle cx="9" cy="7" r="4"> </circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"> </path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"> </path>
                    </svg><span> User</span></a>
            </li>
        @endif
    </ul>
</aside>
