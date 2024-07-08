<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <main class="min-h-screen flex items-center justify-center p-6 bg-white rounded">
        @yield('content')
    </main>
</body>

</html>