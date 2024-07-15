<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="{{asset('public\libraries\adminLTE\css\adminlte.min.css')}}">

  @include('layouts.head')
  <link rel="stylesheet" href="{{asset('public\libraries\js\select2\css\select2.css')}}">
  <link rel="icon" href="{{asset('public/images/default/logos/logo-sm.jpg')}}">

  <style media="screen">
      .card{
          border: solid 1px rgb(193, 193, 193);
      }

      @media (max-width: 576px) {
         .logo-n-exito-nosotros{
            width: 200px;
         }

         .container2{
            width: 99%;

            padding: 0;
         }
         .card-body{
             padding: 5px;
         }
      }

      .btn{
          border: 1px solid rgb(226, 226, 226);
      }
  </style>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse sidebar-closed layout-navbar-fixed layout-fixed">

    @include("layouts.loader")
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light font600" style="padding:8px;font-size:16px;color:white">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        @if(Auth::check())
            <div class="dropdown show">
              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{Auth::user()->email}}
              </a>

              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" href="{{route('logout')}}"> <i class="fas fa-sign-out-alt"></i> Cerrar Sessión</a>
              </div>
            </div>

        @endif
      {{-- <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->

  @include('layoutsAdmin.aside')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Fixed Layout</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="#">Layout</a></li>
              <li class="breadcrumb-item active">Fixed Layout</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section> --}}

    <!-- Main content -->
    <section class="content">
        <br>
        <div class="container2 mt-5">
            @yield('content')
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


@include('layouts.scripts')
<script src="{{asset('public\js\langauage.js')}}"></script>

<script src="{{asset('public\libraries\ckeditor4-standar-custom\ckeditor.js')}}"></script>
<script src="{{asset('public\libraries\js\select2\js\select2.full.min.js')}}"></script>

@yield('scripts')


{{-- <script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> --}}
@include('layoutsAdmin.modalsGlobal.modal_danger')


</body>
</html>
