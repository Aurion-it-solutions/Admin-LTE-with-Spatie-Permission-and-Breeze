<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- Google Font -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" rel="stylesheet">

<!-- CSS Files -->
<link rel="stylesheet" href="{{ asset('lte3/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{ asset('lte3/dist/css/adminlte.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/jqvmap/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/summernote/summernote-bs4.min.css') }}">

<!-- DataTables CSS -->
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

@stack('styles')

<style>
html, body { height: 100%; }
.wrapper { display: flex; flex-direction: column; min-height: 100vh; }
.content-wrapper { flex: 1; }
.custom-alert { position: fixed; top: 20px; right: 20px; z-index: 1050; animation: slideInRight 0.6s ease-out; }
@keyframes slideInRight { from { transform: translateX(100%); opacity: 0; } to { transform: translateX(0); opacity: 1; } }
/* Dark mode extras */
body.dark-mode { background-color: #1e1e2d !important; }
body.dark-mode .main-header { background-color: #1f2937 !important; }
body.dark-mode .main-sidebar { background-color: #111827 !important; }
body.dark-mode .content-wrapper { background-color: #1e1e2d !important; color: #e5e7eb !important; }
body.dark-mode .main-header .nav-link, body.dark-mode .main-sidebar a { color: #d1d5db !important; }
</style>

<script>
// Apply dark/light mode instantly without flicker
(function() {
    const savedTheme = localStorage.getItem('theme') || 'light';
    const body = document.body;

    if(savedTheme === 'dark') body.classList.add('dark-mode');

    document.addEventListener('DOMContentLoaded', () => {
        const navbar = document.getElementById('mainNavbar');
        const sidebar = document.getElementById('mainSidebar');
        const icon = document.getElementById('darkModeIcon');

        function applyTheme(theme) {
            if(theme === 'dark') {
                body.classList.add('dark-mode');
                icon.className = 'fas fa-sun';
                navbar?.classList.remove('navbar-white','navbar-light');
                navbar?.classList.add('navbar-dark');
                sidebar?.classList.remove('sidebar-light-primary');
                sidebar?.classList.add('sidebar-dark-primary');
            } else {
                body.classList.remove('dark-mode');
                icon.className = 'fas fa-moon';
                navbar?.classList.remove('navbar-dark');
                navbar?.classList.add('navbar-white','navbar-light');
                sidebar?.classList.remove('sidebar-dark-primary');
                sidebar?.classList.add('sidebar-light-primary');
            }
        }

        applyTheme(savedTheme);

        const toggle = document.getElementById('darkModeToggle');
        toggle?.addEventListener('click', e => {
            e.preventDefault();
            const newTheme = body.classList.contains('dark-mode') ? 'light' : 'dark';
            localStorage.setItem('theme', newTheme);
            applyTheme(newTheme);
        });
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

<!-- JS Files -->
<script src="{{ asset('lte3/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script> $.widget.bridge('uibutton', $.ui.button); </script>
<script src="{{ asset('lte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte3/dist/js/adminlte.js') }}"></script>

<!-- DataTables JS -->
<script src="{{ asset('lte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>

@stack('scripts')
</body>
</html>
