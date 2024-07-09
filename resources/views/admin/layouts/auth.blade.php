<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url("{{ asset('images/admin_auth_bg.png') }}");
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body class="bg-gray-100">
    <main class="min-h-screen flex items-center justify-center rounded">
        @yield('content')
    </main>
</body>

</html>