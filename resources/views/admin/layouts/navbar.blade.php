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
    </ul>
</nav>
<!-- /.navbar -->

<!-- Example Sidebar -->
<aside id="mainSidebar" class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">My MIS</span>
    </a>
</aside>

<style>
/* Extra Dark Mode Styling */
body.dark-mode {
    background-color: #1e1e2d !important;
}

body.dark-mode .main-header {
    background-color: #1f2937 !important;
    color: #fff !important;
}

body.dark-mode .main-header .nav-link {
    color: #d1d5db !important;
}

body.dark-mode .main-sidebar {
    background-color: #111827 !important;
    color: #d1d5db !important;
}

body.dark-mode .main-sidebar a {
    color: #d1d5db !important;
}

body.dark-mode .content-wrapper {
    background-color: #1e1e2d !important;
    color: #e5e7eb !important;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const toggle = document.getElementById('darkModeToggle');
    const icon = document.getElementById('darkModeIcon');
    const navbar = document.getElementById('mainNavbar');
    const sidebar = document.getElementById('mainSidebar');

    function applyTheme(theme) {
        if (theme === 'dark') {
            document.documentElement.classList.add('dark-mode');
            icon.classList.replace('fa-moon', 'fa-sun');

            // Switch Navbar to Dark
            navbar.classList.remove('navbar-white', 'navbar-light');
            navbar.classList.add('navbar-dark');

            // Switch Sidebar to Dark
            sidebar.classList.remove('sidebar-light-primary');
            sidebar.classList.add('sidebar-dark-primary');
        } else {
            document.body.classList.remove('dark-mode');
            icon.classList.replace('fa-sun', 'fa-moon');

            // Switch Navbar to Light
            navbar.classList.remove('navbar-dark');
            navbar.classList.add('navbar-white', 'navbar-light');

            // Switch Sidebar to Light
            sidebar.classList.remove('sidebar-dark-primary');
            sidebar.classList.add('sidebar-light-primary');
        }
    }

    // Apply stored theme on load
    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);

    toggle.addEventListener('click', function (e) {
        e.preventDefault();
        const newTheme = document.body.classList.contains('dark-mode') ? 'light' : 'dark';
        localStorage.setItem('theme', newTheme);
        applyTheme(newTheme);
    });
});
</script>
