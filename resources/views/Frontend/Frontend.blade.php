<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- Styles -->

    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/owl.carousel.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin/css/owl.theme.default.min.css')}}" rel="stylesheet" />
    <style>
        a{
            text-decoration:none !important;
            color:black !important;
        }
    </style>
</head>
<body>
@include('layouts.inc.frontendNavbar')
    <div class="content">
     @yield('content')
    </div>




     <script src="{{asset('admin/js/jquery-3.6.4.min.js')}}"></script>
     <script src="{{asset('admin/js/custom.js')}}"></script>

     <script src="{{asset('admin/js/sweetalert.min.js')}}"></script>

     <script src="{{asset('admin/js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('admin/js/owl.carousel.js')}}"></script>
    <script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>

@yield('scripts')
@if (session('status')) {
    <script >
    swal("{{ session('status') }}");
   </script>
}
@endif
</body>


</html>
