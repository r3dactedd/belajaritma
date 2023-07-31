<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    @vite('resources/css/app.css')
</head>

<body class="mb-12 bg-gray-100">
    @yield('header')
    @yield('content')
    @yield('course_sidebar')
    @yield('footer')
    <style>
        </body>
