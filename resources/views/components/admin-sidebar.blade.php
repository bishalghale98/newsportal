<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <a href="index.html"> <img alt="image" src="/assets/img/logo.png" class="header-logo" />
            <span class="logo-name">Otika</span>
        </a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Main</li>
        <li class="dropdown active">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
            <a href="#" class="menu-toggle nav-link has-dropdown"><i
                    data-feather="settings"></i><span>Settings</span></a>
            <ul class="dropdown-menu">
                <li><a class="nav-link" href="widget-chart.html">Company</a></li>
            </ul>
        </li>
        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="folder"></i><span>Category</span></a>
        </li>
        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="edit-3"></i><span>Post</span></a>
        </li>
        <li class="dropdown">
            <a href="{{ route('dashboard') }}" class="nav-link"><i data-feather="image"></i><span>Advertisement</span></a>
        </li>
    </ul>
</aside>
