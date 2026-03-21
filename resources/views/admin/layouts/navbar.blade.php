<!-- Navbar -->
<nav id="mainNavbar" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Dark Mode Toggle -->
        <li class="nav-item">
            <a class="nav-link" href="#" id="darkModeToggle" role="button" title="Toggle Dark Mode">
                <i id="darkModeIcon" class="fas fa-moon"></i>
            </a>
        </li>

        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{ \Laravolt\Avatar\Facade::create(Auth::user()->name ?? 'Guest')->toBase64() }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Guest' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <!-- User image -->
                <li class="user-header bg-primary">
                    <img src="{{ \Laravolt\Avatar\Facade::create(Auth::user()->name ?? 'Guest')->toBase64() }}" class="img-circle elevation-2" alt="User Image">
                    <p>
                        {{ Auth::user()->name ?? 'Guest' }}
                        <small>Member since {{ Auth::user()->created_at->format('M. Y') ?? 'N/A' }}</small>
                    </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                    <a href="{{ route('profile.edit') }}" class="btn btn-default btn-flat">Profile</a>
                    <a href="#" class="btn btn-default btn-flat float-right"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
