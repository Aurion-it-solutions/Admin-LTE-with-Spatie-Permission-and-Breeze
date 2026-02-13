<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- Theme switch -->
<script>
(function() {
    const theme = localStorage.getItem('theme');
    if (theme === 'dark') {
        document.documentElement.classList.add('dark-mode');
        document.body.classList.add('dark-mode');
    }
})();
</script>

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
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('lte3/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link rel="stylesheet" href="https://cdn.datatables.net/colreorder/1.6.2/css/colReorder.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.4.1/css/rowReorder.dataTables.min.css">

@stack('styles')

<style>
    /* Flex layout to push footer down */
    html, body {
        height: 100%;
    }

    .wrapper {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .content-wrapper {
        flex: 1;
    }

    /* Custom alert animation */
    .custom-alert {
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1050;
        animation: slideInRight 0.6s ease-out;
    }

    @keyframes slideInRight {
        from { transform: translateX(100%); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">

<div class="wrapper">

    {{-- Navbar --}}
    @include('admin.layouts.navbar')

    {{-- Sidebar --}}
    @include('admin.layouts.sidebar')

    {{-- Content Wrapper --}}
    <div class="content-wrapper">

        {{-- Page Header --}}
        @include('admin.layouts.page-header')

        {{-- Main Content --}}
        <section class="content">
            <div class="container-fluid">
                @yield('small-boxes')
                @yield('content')
            </div>
        </section>

    </div> {{-- End content-wrapper --}}

    {{-- Footer --}}
    @include('admin.layouts.footer')

    {{-- Control Sidebar --}}
    <aside class="control-sidebar control-sidebar-dark"></aside>

</div> {{-- End wrapper --}}

<!-- JS Files -->
<script src="{{ asset('lte3/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script> $.widget.bridge('uibutton', $.ui.button); </script>
<script src="{{ asset('lte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('lte3/dist/js/adminlte.js') }}"></script>

<!-- Optional Plugins -->
<script src="{{ asset('lte3/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/sparklines/sparkline.js') }}"></script>
<script src="{{ asset('lte3/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('lte3/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('lte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('lte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>

<!-- DataTables -->
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
<script src="https://cdn.datatables.net/colreorder/1.6.2/js/dataTables.colReorder.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.4.1/js/dataTables.rowReorder.min.js"></script>

<!-- Auto-close Alerts -->
<script>
setTimeout(() => {
    document.querySelectorAll('.alert').forEach(el => {
        new bootstrap.Alert(el).close();
    });
}, 8000);
</script>

@stack('scripts')

</body>
</html>
