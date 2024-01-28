<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <style>
        * {
            scroll-behavior: smooth;
        }
        .slider {
            transform: translateX(0);
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('sweetalert::alert')
    
    @auth
    @include('layout.navbar-auth')
    @endauth
    @guest
    @include('layout.navbar-guest')
    @endguest
    
    @yield('container')
    
    
    <script src="/js/script.js"></script>
</body>
</html>