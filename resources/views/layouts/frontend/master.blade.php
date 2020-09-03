<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mazlay - Car Accessories Shop HTML Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/img/favicon.ico')}}">    

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">
    
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    @yield('style')
</head>

<body>   
    <div id="ajax-loading" class="text-center">
        <img class="mx-auto" src="{{asset('images/loader.gif')}}" width="70" alt="" style="margin:45vh auto;">
    </div>
    @include('layouts.frontend.header')

    @yield('content')
    
    @include('layouts.frontend.footer')

<!-- Plugins JS -->
<script src="{{asset('frontend/js/plugins.js')}}"></script>
<script src="{{asset('plugins/sweet2/sweetalert2.all.min.js')}}"></script>
<!-- Main JS -->
<script src="{{asset('frontend/js/main.js')}}"></script>

@yield('script')

</body>

</html>