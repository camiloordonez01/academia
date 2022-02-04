<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academia Central</title>
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link href="{{asset('font/css/all.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dataTables.css')}}">
    <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/Chart.css')}}">
    <link rel="stylesheet" href="{{asset('css/swiper.min.css')}}">
    <script src="{{asset('js/Chart.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/md5.min.js')}}"></script>
    @yield('head')
</head>
<body>
    @include('partials.menu')
    @yield('content')
    @include('partials.footer')
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/index.js')}}"></script>
    <script src="{{asset('js/dataTables.js')}}"></script>
    <script src="{{asset('font/js/all.js')}}"></script>
    <script src="{{asset('js/swiper.min.js')}}"></script>
    
</body>
</html>