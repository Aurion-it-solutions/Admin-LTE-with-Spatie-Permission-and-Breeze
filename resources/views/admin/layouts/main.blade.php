<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('lte3/plugins/fontawesome-free/css/all.min.css') }}">

<!-- AdminLTE v4 CSS (all-in-one) -->
<link rel="stylesheet" href="{{ asset('lte3/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/dist/css/adminlte.rtl.min.css') }}"> <!-- optional RTL -->

<!-- Custom styles -->
@stack('styles')
<style>
html, body { height: 100%; }
.wrapper { display: flex; flex-direction: column; min-height: 100vh; }
.content-wrapper { flex: 1; }
.custom-alert { position: fixed; top: 20px; right: 20px; z-index: 1050; animation: slideInRight 0.6s ease-out; }
@keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
</style>

<script>
    (function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        if(savedTheme === 'dark') {
            document.body.classList.add('dark-mode');
        }
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
                @yield('smallboxes')
                @yield('content')
            </div>
        </section>
    </div>

    @include('admin.layouts.footer')
    <aside class="control-sidebar control-sidebar-dark"></aside>
</div>

<!-- jQuery -->
<script src="{{ asset('lte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE v3 JS -->
<script src="{{ asset('lte3/dist/js/adminlte.min.js') }}"></script>

@stack('scripts')
<script>
    $(function() {
        const $body = $('body');
        const $navbar = $('#mainNavbar');
        const $sidebar = $('#mainSidebar');
        const $icon = $('#darkModeIcon');
        const $toggle = $('#darkModeToggle');

        function applyTheme(theme) {
            if(theme === 'dark') {
                $body.addClass('dark-mode');
                $icon.attr('class', 'fas fa-sun');
                $navbar.removeClass('navbar-white navbar-light').addClass('navbar-dark');
                $sidebar.removeClass('sidebar-light-primary').addClass('sidebar-dark-primary');
            } else {
                $body.removeClass('dark-mode');
                $icon.attr('class', 'fas fa-moon');
                $navbar.removeClass('navbar-dark').addClass('navbar-white navbar-light');
                $sidebar.removeClass('sidebar-dark-primary').addClass('sidebar-light-primary');
            }
        }

        // Apply theme components on load
        const savedTheme = localStorage.getItem('theme') || 'light';
        applyTheme(savedTheme);

        $toggle.on('click', function(e) {
            e.preventDefault();
            const newTheme = $body.hasClass('dark-mode') ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            applyTheme(newTheme);
        });
    });
</script>
</body>
</html>
