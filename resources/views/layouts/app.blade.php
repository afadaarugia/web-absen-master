<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>WEB PORTAL</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('/img/2.png') }}"/>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('/adminlte/assets/plugins/datepicker/datepicker3.css') }}')}}">
    <link rel="stylesheet" href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css">
    <!-- DataTables CSS -->
        <link href="{{asset('/lte3/css/addons/datatables2.min.css') }}" rel="stylesheet">
<!-- DataTables Select CSS -->
        <link href="{{asset('/lte3/css/addons/datatables-select2.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="assets/css/skins/_all-skins-min.css">

  <link rel="stylesheet" href="{{asset('/lte3/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/lte3/dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/summernote/summernote-bs4.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('/lte3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('/lte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('/lte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/lte3/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    @yield('css')
</head>
<body class="hold-transition skin-blue sidebar-mini layout-fixed">

@if (!Auth::guest())
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-blue navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link sidebar-toggle-btn" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ url('/home')}}" class="nav-link">Home</a>
              </li>
              <li class="nav-item d-none d-sm-inline-block">
                <a href="/about" class="nav-link">About</a>
              </li>
            </ul>
            <ul class="navbar-nav ml-auto">
               <a class="nav-link sidebar-toggle-btn" data-widget="pushmenu" href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Sign out
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </ul>
        </nav>

        <!-- Left side column. contains the logo and sidebar -->
        @include('layouts.sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>

        <!-- Main Footer -->
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2021 <a href="#">Afada Wafri Arugia</a>.</strong> All rights reserved.
        </footer>

    </div>
@else
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @endif

   
    
        <script src="{{asset('/lte3/plugins/jquery/jquery.min.js')}}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{asset('/lte3/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
          $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/lte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- ChartJS -->
        <script src="{{asset('/lte3/plugins/chart.js/Chart.min.js')}}"></script>
        <!-- Sparkline -->
        <script src="{{asset('/lte3/plugins/sparklines/sparkline.js')}}"></script>
        <!-- JQVMap -->
        <script src="{{asset('/lte3/plugins/jqvmap/jquery.vmap.min.js')}}"></script>

        <script src="{{asset('/lte3/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{asset('/lte3/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
        <!-- daterangepicker -->
        <script src="{{asset('/lte3/plugins/moment/moment.min.js')}}"></script>
        <script src="{{asset('/lte3/plugins/daterangepicker/daterangepicker.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{asset('/lte3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Summernote -->
        <script src="{{asset('/lte3/plugins/summernote/summernote-bs4.min.js')}}"></script>
        <!-- overlayScrollbars -->
        <script src="{{asset('/lte3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/lte3/dist/js/adminlte.js')}}"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{asset('/lte3/dist/js/pages/dashboard.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('/lte3/dist/js/demo.js')}}"></script>

        <!-- jQuery -->
        <script src="{{asset('/lte3/plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('/lte3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <!-- DataTables -->
        <script src="{{asset('/lte3/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('/lte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
        <script src="{{asset('/lte3/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('/lte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('/lte3/dist/js/adminlte.min.js')}}"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{asset('/lte3/dist/js/demo.js')}}"></script>
        <script>
          $(function () {
            $("#example1").DataTable({
              "responsive": true,
              "autoWidth": false,
            });
            $('#example2').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            });
          });
        </script>




    <script>
    $(document).ready(function () {
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

    $('#sidebarCollapse').on('click', function () {
        // open or close navbar
        $('#sidebar').toggleClass('active');
        // close dropdowns
        $('.collapse.in').toggleClass('in');
        // and also adjust aria-expanded attributes we use for the open/closed arrows
        // in our CSS
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        $('.sidebar-toggle-btn').PushMenu(options)

    });
    
    });


    </script>
    @yield('scripts')
    

    
</body>
</html>