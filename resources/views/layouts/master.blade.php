<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arsip Surat</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    @vite(['resources/css/app.css','resources/js/app.js'])    
    <style>
        body{
            background-color: #e1e2e3;
        }
    </style>
</head>
<body>
    @include('layouts.navbar')
    @include('layouts.sidebar')
    @yield('content')
</body>
</html>