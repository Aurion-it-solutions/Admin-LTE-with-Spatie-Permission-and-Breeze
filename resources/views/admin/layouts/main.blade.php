<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">

<!-- AdminLTE v4 CSS (all-in-one) -->
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.rtl.min.css') }}"> <!-- optional RTL -->

<!-- Custom styles -->
@stack('styles')
<style>
html, body { height: 100%; }
.wrapper { display: flex; flex-direction: column; min-height: 100vh; }
.content-wrapper { flex: 1; }
.custom-alert { position: fixed; top: 20px; right: 20px; z-index: 1050; animation: slideInRight 0.6s ease-out; }
@keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
/* Dark mode */
body.dark-mode { background-color: #1e1e2d !important; }
body.dark-mode .main-header { background-color: #1f2937 !important; }
body.dark-mode .main-sidebar { background-color: #111827 !important; }
body.dark-mode .content-wrapper { background-color: #1e1e2d !important; color: #e5e7eb !important; }
body.dark-mode .main-header .nav-link, body.dark-mode .main-sidebar a { color: #d1d5db !important; }
</style>

<script>
(function() {
    const body = document.body;
    const savedTheme = localStorage.getItem('theme') || 'light';
    const navbar = document.getElementById('mainNavbar');
    const sidebar = document.getElementById('mainSidebar');
    const icon = document.getElementById('darkModeIcon');
    const toggle = document.getElementById('darkModeToggle');

    function applyTheme(theme) {
        if(theme === 'dark') {
            body.classList.add('dark-mode');
            icon && (icon.className = 'fas fa-sun');
            navbar?.classList.replace('navbar-white','navbar-dark');
            sidebar?.classList.replace('sidebar-light-primary','sidebar-dark-primary');
        } else {
            body.classList.remove('dark-mode');
            icon && (icon.className = 'fas fa-moon');
            navbar?.classList.replace('navbar-dark','navbar-white');
            sidebar?.classList.replace('sidebar-dark-primary','sidebar-light-primary');
        }
    }

    applyTheme(savedTheme);

    toggle?.addEventListener('click', e => {
        e.preventDefault();
        const newTheme = body.classList.contains('dark-mode') ? 'light' : 'dark';
        localStorage.setItem('theme', newTheme);
        applyTheme(newTheme);
    });
})();
</script>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<div class="wrapper">

    @include('admin.layouts.navbar')
    @include('admin.layouts.sidebar')

    <div class="content-wrapper">
        @include('admin.layouts.page-header')
        <section class="content">
            <div class="container-fluid">
                @yield('small-boxes')
                @yield('content')
            </div>
        </section>
    </div>

    @include('admin.layouts.footer')
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- AdminLTE v4 JS -->
<script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')
</body>
</html>
