<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Create Account')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    <main class="min-h-screen">
        <div class="w-full flex items-center justify-between bg-white px-8 py-3 shadow">
            <h2 class="text-blue-900 font-semibold">WebEd</h2>
            <ul class="flex items-center justify-end gap-5">
                <li>
                    <a class="hover:text-blue-500" href="#!">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-500" href="#!">
                        <i class="fa-regular fa-message"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="block md:flex min-h-screen items-start justify-start">
            <!-- sidebar -->
            <div class="hidden md:block border-t min-h-screen p-4 bg-white shadow md:w-1/5 w-full">
                <div class="p-3 flex items-center justify-start gap-3">
                    <button style="height: 30px; width: 30px" class="bg-slate-100 rounded hover:bg-slate-50 hover:border">
                        <i class="fa-solid fa-bars-staggered text-gray-600 text-sm"></i>
                    </button>
                    <div class="flex items-center justify-start gap-1">
                        <span class="font-semibold text-gray-600">WebEd</span>
                        <img src="{{ asset('images/ark_logo.jpg') }}" alt="" style="height: 30px; width: 30px" />
                    </div>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3">
                        <i class="fa-solid fa-house"></i>Home</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-user-group"></i>Account Management</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bullhorn"></i></i>Attendance Report</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-sheet-plastic"></i>Attendance Sheet</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-graduation-cap"></i>Students Grade</a>
                </div>
                <div class="py-2">
                    <hr>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bell"></i>Notifications</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-gear"></i>Settings</a>
                </div>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>
                </div>
                <hr>
                <div class="p-3 hover:bg-blue-50 rounded hover:text-blue-500 text-gray-700">
                    <div class="flex justify-start items-center gap-2">
                        <img src="https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png" alt="User profile" class="rounded-full" style="height: 33px; width: 33px;">
                        <div class="flex flex-col justify-start items-start">
                            <span class="text-gray-600 text-sm font-semibold">John Doe</span>
                            <span class="text-gray-500 text-sm">sample@gmail.com</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <!-- main content -->
            <div class="min-h-screen md:w-4/5 w-full">
                @yield('content')
            </div>
            <!-- main content -->
        </div>
    </main>
    <script>
        $(document).ready(() => {
            $('.toggle-password').on('click', function() {
                const passwordInput = $($(this).attr('toggle'));
                const isPassword = passwordInput.attr('type') === 'password';
                passwordInput.attr('type', isPassword ? 'text' : 'password');
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>

</body>

</html>