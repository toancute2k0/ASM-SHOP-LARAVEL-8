<?php
    $menus = config('menu'); // duyệt mảng tạo menu
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin - @yield('title')</title>

        <!-- Google Font: Source Sans Pro -->
        {{-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback" /> --}}
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{url('public/backend')}}/plugins/fontawesome-free/css/all.min.css" />
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{url('public/backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css" />
        <!-- DataTables -->
        <link rel="stylesheet" href="{{url('public/backend')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('public/backend')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
        <link rel="stylesheet" href="{{url('public/backend')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{url('public/backend')}}/dist/css/adminlte.min.css" />
        <!-- JavaScript -->
        <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
        <!-- CSS -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
        <!-- Default theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
        <!-- Semantic UI theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
        <!-- Bootstrap theme -->
        <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
        {{-- css main --}}
        @yield('css')
        <style>
            body {
                font-family: 'Poppins', sans-serif !important;
            }
            .bg__custom {
                background-color: black;
            }
            .text-muted {
                color: red !important;
            }
            .dropdown:hover>.dropdown-menu {
                display: block;
            }
            .dropdown>.dropdown-toggle:active {
            /*Without this, clicking will make it sticky*/
                pointer-events: none;
            }

        </style>
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

        <!-- Site wrapper -->
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light sb-custom">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                    <li class="nav-item d-none d-sm-inline-block">
                        <a href="{{route('home.index')}}" class="nav-link">Về trang web</a>
                    </li>
                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Sidebar user (optional) -->
                    <div class="dropdown">
                        <div class="user-panel d-flex pr-3" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="image">
                                <img src="{{url('public/backend')}}/dist/img/admin1.jpg" class="img-circle elevation-2" alt="User Image" />
                            </div>
                            <div class="info">
                                <a href="#" class="d-block text-dark ">HI {{Auth::user()->name}}</a>
                            </div>
                        </div>
                        <div class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="{{route('logout')}}" onclick="return confirm('Bạn có nỡ thoát sau ?')">Đăng xuất</a>
                        </div>
                    </div>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4 bg__custom">
                <!-- Brand Logo -->
                <a href="{{route('admin.dashboard')}}" class="brand-link">
                    <img src="{{url('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8;" />
                    <span class="brand-text font-weight-light">AdminLTE 3</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        {{-- vòng lặp duyệt mảng menu từ config --}}
                        @foreach ($menus as $m)
                            <li class="nav-item">
                                <a href="{{route($m['route'])}}" class="nav-link">
                                    <i class="nav-icon fas {{($m['icon'])}}"></i>
                                    <p>
                                        {{($m['label'])}}
                                        @if (isset($m['items']))
                                            <i class="right fas fa-angle-left"></i>
                                        @endif
                                    </p>
                                </a>
                                @if (isset($m['items']))
                                    <ul class="nav nav-treeview">
                                        @foreach ($m['items'] as $mcon)
                                            <li class="nav-item">
                                                <a href="{{route($mcon['route'])}}" class="nav-link">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>{{($mcon['label'])}}</p>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <!-- Default box -->
                                @yield('content')
                                <!-- /.card -->
                            </div>
                        </div>
                    </div>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{url('public/backend')}}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{url('public/backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{url('public/backend')}}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{url('public/backend')}}/plugins/jszip/jszip.min.js"></script>
<script src="{{url('public/backend')}}/plugins/pdfmake/pdfmake.min.js"></script>
<script src="{{url('public/backend')}}/plugins/pdfmake/vfs_fonts.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{url('public/backend')}}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{url('public/backend')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{url('public/backend')}}/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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
// alert components
<x-error/>
@yield('js')
</body>
</html>
