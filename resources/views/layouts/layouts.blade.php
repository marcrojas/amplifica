<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amplifica</title>

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">


    <script src="{{ asset('js/jquery-3.7.1.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>

    <!-- DataTables CSS -->
    <script src="{{ asset('js/buttons.bootstrap5.min.js') }}"></script>
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}"  rel="stylesheet" type="text/css" />

    <!-- DataTables Buttons JS -->
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>

    <!-- JSZip for Excel export -->
    <script src="{{ asset('js/jszip.min.js') }}"></script>

    <!-- Buttons for Excel -->
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>

    <!-- Layout config Js -->
    <script src="{{ asset('js/imprime_todos_los_resgistros.js') }}"></script>


    <script src="{{ asset('js/color-modes.js')}}"></script>
    <script src="{{ asset('js/sweetalert2.js')}}"></script>


    <style>

        body{
            font-size: 14px;
        }

        a{
            text-decoration: none;
            color: #ffffff;
        }

        .form-select,
        .form-control,
        .btn-primary,
        .btn-success,
        .btn-danger {
            height: 44px;
            border-radius: 8px;
        }


        .main-footer {
            background-color: #343a40 !important;
            border-color: #4b545c !important;
        }


        :root { color-scheme: light; }


        /* HABILITADOS (incluye focus) */
        .form-control:not(:disabled):not([readonly]),
        .form-select:not(:disabled),
        .form-control:not(:disabled):not([readonly]):focus,
        .form-select:not(:disabled):focus {
            background-color: #fff !important;
            color: #000 !important;
        }

        /* DESHABILITADOS / READONLY */
        .form-control:disabled,
        .form-select:disabled,
        .form-control[readonly] {
            background-color: #f1f3f5 !important; /* plomo claro */
            color: #6c757d !important;            /* texto plomo */
            opacity: 1 !important;                /* que no se “apague” demasiado */
        }

        /* Placeholders de deshabilitados (opcional) */
        .form-control:disabled::placeholder,
        .form-control[readonly]::placeholder {
            color: #8a8f94 !important;
            opacity: 1;
        }


        /* Asegura que el contenedor recorte las esquinas */
        .modal-content{
            background: #fff;
            border: 0;
            border-radius: .5rem;          /* o .3rem si usas el default */
            overflow: hidden;              /* clave: evita que el blanco se asome */
        }

        /* Header oscuro con el mismo radio arriba */
        .modal-header{
            background: #454d55;
            color: #fff;
            border-bottom: 0;
            border-top-left-radius: .5rem; /* mismo valor que .modal-content */
            border-top-right-radius: .5rem;
        }

        /* Capa blanca sólo en body/footer */
        .modal-body,
        .modal-footer{
            background: #fff;
        }

    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

    <!-- Preloader -->
    <!--<div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>-->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark" style="background-color:  #1d2329;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            {{--<li class="nav-item d-none d-sm-inline-block">
                <a href="index3.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>--}}
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <img class="rounded-circle" width="32" src="{{ asset("img/avatar-8.jpg") }}" alt="avatar-3">
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header" style="text-align: left;"> <span>Bienvenido</span> </span>
                    <div class="dropdown-divider"></div>
                    {{--<a href="#" class="dropdown-item" style="font-size: 14px;">
                        <i class="fas fa-user" style="color: #ffffff;"></i> <span style="color: #ffffff;">Mi cuenta</span>
                    </a>
                    <div class="dropdown-divider"></div>--}}
                    <a href="{{ route("logout") }}" class="dropdown-item" style="font-size: 14px;">
                        <i class="fas fa-user-lock"></i> <span>Logout</span>
                    </a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4" style="background-color: #1d2329;">
        <!-- Brand Logo -->



        <a href="#" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Amplifica</span>
            <div style="font-size: 14px; margin-top: 13px; margin-left: 10px;">
                Hola! {{ Auth::user()->name }}
            </div>

        </a>


        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel pb-3 mb-1 d-flex">
                <div class="info" style="margin-top: 70px;">
                    <a href="#" class="d-block">Menú</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->

                    <li class="nav-item">
                        <a href="{{route("listado_productos")}}" class="nav-link" style="color:#ffffff;">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Productos
                            </p>
                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route("regiones")}}" class="nav-link" style="color:#ffffff;">
                            <i class="nav-icon fas fa-city"></i>
                            <p>
                                Regiones
                            </p>
                        </a>
                    </li>


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

                @yield('content_home')

            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2025 <a href="https://adminlte.io">Amplifica</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.1.0
        </div>
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- Bootstrap -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.js')}}" crossorigin="anonymous"></script>



</body>
</html>


