<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet" />

    @vite('resources/css/app.css')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css" rel="stylesheet" />
    {{-- Tiny for Forums --}}
    <script src="https://cdn.tiny.cloud/1/uxtcpbcit7xmgtv5qwxb0cqgz9z1foh3adbjq1hcqvzvvwv3/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>

</head>

<body class="mb-12 bg-gray-100">
    @yield('header')
    <div class="pt-16">
        @yield('content') <!-- Your page content -->
    </div>
    @yield('footer')
    {{-- Flowbite for Modal popup --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
