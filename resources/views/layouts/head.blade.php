
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="csrf-token" content="{{ csrf_token() }}">




    <!-- Title -->
    <title>@yield('title')</title>

    {{-- datatables --}}
    <link rel="stylesheet" href="{{asset('public/libraries/DataTables/datatables.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/libraries/DataTables/DataTables-1.10.20/css/dataTables.bootstrap4.min.css')}}">


    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/images/default/logo-sm.jpg')}}">
    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/libraries/fontawesome/css/all.min.css')}}">

    {{-- ">   --}}
    <link rel="stylesheet" href="{{asset("public/libraries/toastr/toastr.css")}}">
    <link rel="stylesheet" href="{{asset("public/libraries/venobox/venobox.min.css")}}">
    <link rel="stylesheet" href="{{asset("public/css/loader.css")}}">
    <link rel="stylesheet" href="{{asset("public/css/style.css")}}">
    <!-- Core Stylesheet -->
