<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Create Account')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>

    @vite('resources/css/app.css')

    <style>
        html::-webkit-scrollbar {
            display: none;
        }

        * {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-gray-100">
    <main class="min-h-screen">
        <div class="w-full flex items-center justify-between bg-white px-8 py-3 shadow border-b">
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
        <div class="block md:flex h-screen items-start justify-start">
            <!-- sidebar -->
            <div class="hidden md:block  p-4 bg-white shadow border-r" style="height: 100%; min-width: 280px">
                <div class="p-3 flex items-center justify-start gap-3">
                    <button style="height: 30px; width: 30px" class="bg-slate-100 rounded hover:bg-slate-50 hover:border">
                        <i class="fa-solid fa-bars-staggered text-gray-600 text-sm"></i>
                    </button>
                    <div class="flex items-center justify-start gap-1">
                        <span class="font-semibold text-gray-600">WebEd</span>
                        <img src="{{ asset('images/ark_logo.jpg') }}" alt="" style="height: 30px; width: 30px" />
                    </div>
                </div>
                <div class="p-3 {{ request()->is('admin') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('admin.home') }}" class="text-sm flex items-center justify-start gap-3">
                        <i class="fa-solid fa-house"></i>Home</a>
                </div>
                <div class="p-3 {{ request()->is('admin/dashboard') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('admin.dashboard') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
                </div>
                <div class="p-3 {{ (request()->is('admin/create/admin') || request()->is('admin/create/teacher') || request()->is('admin/create/guidance') || request()->is('admin/create/student') || request()->is('admin/account_management/admin_list') || request()->is('admin/account_management/student_list') || request()->is('admin/account_management/guidance_list') || request()->is('admin/account_management/teacher_list')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <div class="relative inline-block text-left w-full">
                        <div class="w-full">
                            <button type="button" class="text-sm flex items-center justify-start gap-3 w-full" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <i class="fa-solid fa-user-group"></i>
                                Account Management
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div role="none">
                                <a href="{{ route('admin.admin_list') }}" class="{{ request()->is('admin/account_management/admin_list') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list"></i> Admin List</a>
                                <a href="{{ route('admin.guidance_list') }}" class="{{ request()->is('admin/account_management/guidance_list') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-1"><i class="fa-solid fa-list"></i> Guidance List</a>
                                <a href="{{ route('admin.teacher_list') }}" class="{{ request()->is('admin/account_management/teacher_list') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-2"><i class="fa-solid fa-list"></i> Teacher List</a>
                                <a href="{{ route('admin.student_list') }}" class="{{ request()->is('admin/account_management/student_list') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-2"><i class="fa-solid fa-list"></i> Student List</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-3 {{ request()->is('admin/attendance_report') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bullhorn"></i></i>Attendance Report</a>
                </div>
                <div class="p-3 {{ request()->is('admin/attendance_sheet') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-sheet-plastic"></i>Attendance Sheet</a>
                </div>
                <div class="p-3 {{ request()->is('admin/students_grade') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-graduation-cap"></i>Students Grade</a>
                </div>
                <div class="py-2">
                    <hr>
                </div>
                <div class="p-3 {{ request()->is('admin/notifications') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="#!" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bell"></i>Notifications</a>
                </div>
                <div class="p-3 {{ (request()->is('admin/settings') || request()->is('admin/profile')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('admin.profile') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-gear"></i>Settings</a>
                </div>
                <div class="p-3 hover:bg-blue-50 hover:text-blue-500 text-gray-700 rounded">
                    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="button" class="text-sm flex items-center justify-start gap-3" id="logout-btn">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
                <hr>
                <div class="p-3 text-gray-700">
                    <div class="flex justify-start items-center gap-2">
                        <img src="{{ isset($user->profile) ? asset('storage/' . $user->profile) : 'https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png' }}" alt="User profile" class="rounded-full border" style="height: 45px; width: 45px;">
                        <div class="flex flex-col justify-start items-start flex-wrap">
                            <span class="text-gray-600 text-xs font-semibold">{{ $user->name }}</span>
                            <span class="text-gray-500 text-xs">{{ $user->email }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <!-- main content -->
            <div class="h-full w-full" style="overflow-y: auto;">
                @yield('content')
            </div>
            <!-- main content -->
        </div>
    </main>
    <script>
        try {
            document.addEventListener('DOMContentLoaded', () => {
                const dropzone = document.getElementById('dropzone');
                const fileInput = document.getElementById('file-upload');
                const preview = document.getElementById('preview');

                const displayPreview = (file) => {
                    const reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = () => {
                        preview.src = reader.result;
                        preview.classList.remove('hidden');
                    };
                };

                dropzone.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    dropzone.classList.add('border-indigo-600');
                });

                dropzone.addEventListener('dragleave', (e) => {
                    e.preventDefault();
                    dropzone.classList.remove('border-indigo-600');
                });

                dropzone.addEventListener('drop', (e) => {
                    e.preventDefault();
                    dropzone.classList.remove('border-indigo-600');
                    const file = e.dataTransfer.files[0];
                    if (file) {
                        displayPreview(file);
                        fileInput.files = e.dataTransfer.files;
                    }
                });

                fileInput.addEventListener('change', (e) => {
                    const file = e.target.files[0];
                    if (file) {
                        displayPreview(file);
                    }
                });
            });
        } catch (err) {

        }
    </script>

    <script>
        try {
            $(document).ready(() => {
                $('.toggle-password').on('click', function() {
                    const passwordInput = $($(this).attr('toggle'));
                    const isPassword = passwordInput.attr('type') === 'password';
                    passwordInput.attr('type', isPassword ? 'text' : 'password');
                    $(this).toggleClass('fa-eye fa-eye-slash');
                });
            });
        } catch (err) {

        }
    </script>
    @if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: 'success',
                title: "{{ session('success') }}"
            });

        });
    </script>
    @endif

    @if (session('ERROR'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            Toast.fire({
                icon: 'error',
                title: "{{ session('error') }}"
            });

        });
    </script>
    @endif

    <script>
        try {
            $(document).ready(function() {
                $('#logout-btn').click(function() {
                    Swal.fire({
                        title: 'Logout',
                        text: 'Are you sure you want to logout?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, logout'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#logout-form').submit();
                        }
                    });
                });
            });
        } catch (err) {

        }
    </script>

    <script>
        $(document).ready(function() {
            $('#menu-button').on('click', function() {
                const expanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !expanded);
                $('#dropdown-menu').toggleClass('hidden');
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#menu-button, #dropdown-menu').length) {
                    $('#dropdown-menu').addClass('hidden');
                    $('#menu-button').attr('aria-expanded', 'false');
                }
            });
        });
    </script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>

</body>

</html>