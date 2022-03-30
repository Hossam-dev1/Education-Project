<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html >

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Samour|Dashboard</title>
    <link rel="icon" href="{{asset('admin/img/icon2.png')}}">


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/css/fontawesome.all.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/css/adminlte.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    
    @yield('styles')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-secondary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/') }}" class="brand-link">
                <img src="{{ asset('admin/img/icon2.png') }}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span  class="brand-text font-weight-light">Samuor | Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                @if (Auth::user()->role == 'super')
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('admin/img/teacher.jpeg') }}" class="img-circle elevation-2"
                            alt="User Image">
                    </div>
                    <div class="info">
                        <a href="{{ url('dashboard/admins') }}" class="d-block">Admin Profile</a>
                    </div>
                </div>
                @endif

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="fas fa-house-user pr-2"></i>
                                <p>
                                    Home Page
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/levels') }}" class="nav-link">
                                        <i class="fas fa-layer-group pr-2"></i>
                                        <p>
                                            Levels
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/skills') }}" class="nav-link">
                                        <i class="fas fa-indent pr-2"></i>
                                        <p>
                                            Subjects
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/exams') }}" class="nav-link">
                                        <i class="far fa-clipboard pr-2"></i>
                                        <p>
                                            Exams
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/videos') }}" class="nav-link">
                                        <i class="far fa-play-circle pr-2"></i>
                                        <p>
                                            Videos
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/students') }}" class="nav-link">
                                        <i class="fas fa-user-graduate pr-2"></i>
                                        <p>
                                            Students
                                        </p>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a href="{{ url('dashboard/admins') }}" class="nav-link">
                                        <i class="fas fa-user-cog pr-2"></i>
                                        <p>
                                            Admins
                                        </p>
                                    </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/ads') }}" class="nav-link">
                                        <i class="fas fa-bullhorn pr-1"></i>
                                        <p>
                                            Ads
                                        </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('dashboard/teacher') }}" class="nav-link">
                                        <i class="far fa-calendar-alt pr-1"></i>                                        
                                        <p>
                                            Appointment
                                        </p>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>




                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        @yield('main')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <a id="back-to-top" href="#" class="btn btn-primary back-to-top mb-5" role="button" aria-label="Scroll to top">
            <i class="fas fa-chevron-up"></i>
          </a>
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right mb-0 ">
                <button onclick="window.print()" type="submit" class="btn btn-info p-2 px-3">Print</button>
                {{-- <a class="btn btn btn-secondary p-2 px-2 ml-1" href="{{ url()->previous() }}">Back</a> --}}
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 <a href="https://www.facebook.com/7oss2mashr2f" target="_blank">7oSsaM</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('admin/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin/js/bootstrap.bundle.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin/js/adminlte.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>

    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    @yield('scripts')
</body>

</html>
