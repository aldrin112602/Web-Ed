<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Create Account')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    @yield('custom_css')

    <!-- <link rel="manifest" href="{{ asset('manifest.json') }}"> -->
</head>

<body class="bg-gray-100">
    <main class="min-h-screen">
        <div class="w-full flex items-center justify-between bg-white px-8 py-3 shadow border-b">
            <h2 class="text-blue-900 font-semibold">WebEd</h2>
            <ul class="flex items-center justify-end gap-5">
                <li>
                    <a class="hover:text-blue-500" href="{{ route('guidance.notification') }}">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-500" href="{{ route('guidance.chats.index') }}">
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

                <div class="p-3 {{ request()->is('guidance/dashboard') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.dashboard') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
                </div>

                <!-- <div class="p-3 {{ request()->is('guidance/profile') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-user"></i>My Profile</a>
                </div> -->


                <div class="p-3 {{ request()->is('guidance/attendance_report') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.attendance_report') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-cube"></i>Attendace Report</a>
                </div>


                <div class="p-3 {{ request()->is('guidance/attendance_history') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.attendance_history') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-cube"></i>Attendace History</a>
                </div>

                <div class="p-3 {{ request()->is('guidance/chats') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.chats.index') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-regular fa-message"></i>Messages <span class="text-rose-600 font-semibold" id="messageCounts">0</span></a>
                </div>
                <script>
                    $(() => {
                        $.ajax({
                            url: '{{ route('guidance.get_message_count') }}',
                            method: 'GET',
                            success: (response) => {
                                $('#messageCounts').text(response.count);
                            }
                        });
                    })
                </script>

                <div class="p-3 {{ request()->is('guidance/notifications') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.notification')}}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bell"></i>Notifications</a>
                </div>

                <div class="py-12">
                    <hr>
                </div>

                <div class="p-3 {{ (request()->is('guidance/settings') || request()->is('guidance/profile')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('guidance.profile') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-gear"></i>Settings</a>
                </div>
                <div class="p-3 hover:bg-blue-50 hover:text-blue-500 text-gray-700 rounded">
                    <form id="logout-form" action="{{ route('guidance.logout') }}" method="POST">
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
            <div class="h-screen w-full" style="overflow-y: auto;">
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

    <script>
        let selectAll = document.getElementById('selectAll')
        if (selectAll) {
            selectAll.addEventListener('change', function() {
                let checkboxes = document.querySelectorAll('.selectRow');
                checkboxes.forEach(checkbox => checkbox.checked = this.checked);
            });
        }
    </script>

<script>
        // if ('serviceWorker' in navigator) {
        //     navigator.serviceWorker.register('{{ asset("service-worker.js") }}').then(function(registration) {
        //         console.log('Service Worker registered with scope:', registration.scope);
        //     }).catch(function(error) {
        //         console.log('Service Worker registration failed:', error);
        //     });
        // }
    </script>

</body>

</html>
