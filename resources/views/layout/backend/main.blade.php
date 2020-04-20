<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Dashboard | @yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('site/'.$site->vaficon) }}">
 
        <link href="{{ asset('admin/plugins/jvectormap/jquery-jvectormap-2.0.2.css') }}" rel="stylesheet">
        <!-- DataTables -->
        <link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- This Page -->
        @stack('css')

        <!-- App css -->
        <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/metismenu.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet" type="text/css" />

    </head>

    <body>

        @include('layout.backend.topbar')
        <!-- Top Bar End -->
        @include('layout.backend.second_topbar')
        
        <div class="page-wrapper">
            <div class="page-wrapper-inner">

                @include('layout.backend.sidebar')

                <!-- Page Content-->
                <div class="page-content">
                    <div class="container-fluid">
                        @yield('content')
                    </div><!-- container -->

                    <footer class="footer text-center text-sm-left">
                        &copy; 2020 {{ $site->site_name}} <span class="text-muted d-none d-sm-inline-block float-right">Created By <a href="mailto:baagas0@gmail.com">Bagas</a></span>
                    </footer>
                </div>
                <!-- end page content -->
            </div>
            <!--end page-wrapper-inner -->
        </div>
        <!-- end page-wrapper -->

        

    </body>
</html>
<!-- jQuery  -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('admin/js/waves.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>

<!-- This Page  -->
@stack('js')

<!-- App js -->
<script src="{{ asset('admin/js/app.js') }}"></script>