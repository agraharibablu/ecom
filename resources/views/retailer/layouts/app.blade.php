<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Money Transfer</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" />

  <link rel="stylesheet" href="{{ asset('assets') }}/custom/custom.css">
  <style>
    label {
      font-size: 14px;
      margin: 0rem !important;
    }

    .form-group {
      margin-bottom: 0.5rem !important;
    }

    span.custom-text-danger {
      font-weight: 500;
      color: red !important;
      font-size: 14px;
    }

    .bg-custom-sidebar {
      background: #191b2a !important;
    }

    .card-custom-header {
      background: #2fc296 !important;
    }
  </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- <div class="preloader flex-column justify-content-center align-items-center">
      <img class="" src="{{ asset('assets/profile/loader.gif') }}" alt="AdminLTELogo" style="height: 140px;
    width: 144px;">
    </div> -->

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">

        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span><i class="far fa-user"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <!-- Message Start -->

            <a href="javascript:void(0);" class="pro-li dropdown-item"><span><img class="profile-small img-fluid img-circle" id="avatar" src="{{ profileImage() }}" alt="User profile picture"></span> <span>{{ ucwords(Auth::user()->full_name)}}</span></a>

            <a href="{{ url('retailer/profile') }}" class="pro-li dropdown-item">
             <span><i class="far fa-user"></i></span> Profile
            </a>
            <a class="dropdown-item" href="{{ url('retailer/logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
              <button class="btn btn-danger logout-button w-100"><span class="icon is-small"> <i data-feather="log-out"></i> </span>
                <form id="logout-form" action="{{ url('retailer/logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
                <span>Logout</span>
              </button>
            </a>
            <!-- <div class="dropdown-divider"></div> -->
          </div>
        </li>


        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-custom-sidebar">
      <!-- Brand Logo -->
      <a class="brand-link">
        <img src="{{ asset('assets') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Money Transfer</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="{{profileImage()}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="{{ url('retailer/profile') }}" class="d-block">{{ ucwords(Auth::user()->full_name) }}</a>
          </div>
        </div>

        @include('retailer.layouts.sidebar')

      </div>
      <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- /.content-header -->
      <section class="content">
        <div class="container-fluid">

          @yield('content')
        </div>
      </section>
    </div>


    <footer class="main-footer">
      <strong>Copyright &copy; 2021-{{ date('Y') }} <a href="url('admin/money-transter')">MoneyTransfer</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 1.0.0-rc
      </div>
    </footer>


  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{ asset('assets') }}/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="{{ asset('assets') }}/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="{{ asset('assets') }}/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="{{ asset('assets') }}/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="{{ asset('assets') }}/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="{{ asset('assets') }}/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
  <script src="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="{{ asset('assets') }}/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('assets') }}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('assets') }}/dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="{{ asset('assets') }}/dist/js/demo.js"></script> -->
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="{{ asset('assets') }}/dist/js/pages/dashboard.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

  <script>
    -
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    }); -
    //show uploaded file name in input field
    $(document).on('change', 'input[type=file]', function() {
      var fileName = this.files[0].name;
      $(this).parent().find('label').html(fileName);
    })

    /*start single image preview*/
    $(document).on('change', '#imgInp', function() {
      var fileName = imgInp.files[0].name;
      $('.file-name').html(fileName);
      const [file] = imgInp.files
      if (file) {
        $('#avatar').show();
        avatar.src = URL.createObjectURL(file)
      }
    });
    /*end single image preview*/
  </script>

  @stack('custom-script')

  @stack('modal')
</body>

</html>