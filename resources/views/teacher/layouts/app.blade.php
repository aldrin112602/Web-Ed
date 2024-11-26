<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Create Account')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <!-- <link rel="manifest" href="{{ asset('manifest.json') }}"> -->

    @vite('resources/css/app.css')

    <style>
        html::-webkit-scrollbar {
            display: none;
        }

        * {
            scroll-behavior: smooth;
        }

        @media print {
            #tablePreview {
                position: fixed;
                top: 0;
                left: 0;
                background: white;
                z-index: 100;
                width: 100vw;
                height: 100vh;
            }

            #tablePreview ._header {
                display: block !important;
            }

            #tablePreview h2 {
                display: block !important;
            }

            #tablePreview table tr td:first-child,
            #tablePreview table tr th:first-child,
            #tablePreview table tr td:last-child,
            #tablePreview table tr th:last-child {
                display: none !important;
            }

            #tablePreview table tr input[type="checkbox"]:not(:checked)+.ellipsis-text {
                display: none !important;
            }

        }
    </style>
</head>

<body class="bg-gray-100">
    <main class="min-h-screen">
        <div class="w-full flex items-center justify-between bg-white px-8 py-3 shadow border-b">
            <h2 class="text-blue-900 font-semibold">
                <script>
                    $(() => {
                        $('#toggleBtn').click(() => {
                            $('#sideBar').toggle(100);
                        });
                    });
                </script>
                <button id="toggleBtn" style="height: 30px; width: 30px" class="bg-slate-100 rounded hover:bg-slate-50 hover:border">
                    <i class="fa-solid fa-bars-staggered text-gray-600 text-sm"></i>
                </button> WebEd
            </h2>
            <ul class="flex items-center justify-end gap-8">
                <li>
                    <a class="hover:text-blue-500" href="{{ route('teacher.announcements') }}">
                        <i class="fa-solid fa-bullhorn"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-500" href="{{ route('teacher.notification') }}">
                        <i class="fa-regular fa-bell"></i>
                    </a>
                </li>
                <li>
                    <a class="hover:text-blue-500" href="{{ route('teacher.chats.index') }}">
                        <i class="fa-regular fa-message"></i>
                    </a>
                </li>
            </ul>
        </div>


        <div class="block md:flex min-h-screen items-start justify-start">
            <!-- sidebar -->
            <div id="sideBar" class="hidden md:block  p-4 bg-white shadow border-r" style="height: 100%; min-width: 280px">
                <div class="p-3 flex items-center justify-start gap-3">
                    <div class="flex items-center justify-start gap-1">
                        <span class="font-semibold text-gray-600">WebEd</span>
                        <img class="object-cover" src="{{ asset('images/ark_logo.jpg') }}" alt="" style="height: 30px; width: 30px" />
                    </div>
                </div>

                <div class="p-3 {{ request()->is('teacher/dashboard') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('teacher.dashboard') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-chart-line"></i>Dashboard</a>
                </div>

                <div class="p-3 {{ request()->is('teacher/subject_list') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <div class="relative inline-block text-left w-full">
                        <div class="w-full">
                            <button type="button" class="text-sm flex items-center justify-start gap-3 w-full" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                <i class="fa-solid fa-list"></i>
                                My Subjects
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div role="none">
                                @if ($handleSubjects->isEmpty())

                                <div class="p-4 text-gray-600 text-sm">
                                    <p class="text-rose-600">No subjects found. </p><a href="{{ route('teacher.view.add_grade_handle') }}" class="text-sm underline"><i class="fas fa-plus"></i> Add</a>
                                </div>

                                @else
                                @foreach ($handleSubjects as $gradeHandle)
                                <a href="{{ route('teacher.subject_list', ['id' => $gradeHandle->id])}}" title="Click to view" class="{{ (request()->query('id') == $gradeHandle->id && request()->is('teacher/subject_list')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list-ul"></i>Grade {{ $gradeHandle->grade }} - {{ $gradeHandle->strand }} ({{ $gradeHandle->section }})</a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 {{ request()->is('teacher/student_list') || request()->is('teacher/presents') || request()->is('teacher/absents') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <div class="relative inline-block text-left w-full">
                        <div class="w-full">
                            <button type="button" class="text-sm flex items-center justify-start gap-3 w-full" id="menu-button-2" aria-expanded="true" aria-haspopup="true">
                                <i class="fa-solid fa-users"></i>
                                My Students
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu-2" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-2" tabindex="-1">
                            <div role="none">
                                @if ($handleSubjects->isEmpty())

                                <div class="p-4 text-gray-600 text-sm">
                                    <p class="text-rose-600">No students found.</p>
                                </div>

                                @else
                                @foreach ($handleSubjects as $gradeHandle)
                                <a href="{{ route('teacher.student_list', ['id' => $gradeHandle->id])}}" title="Click to view" class="{{ (request()->query('id') == $gradeHandle->id && (request()->is('teacher/student_list') || request()->is('teacher/absents') || request()->is('teacher/presents'))) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list-ul"></i>Grade {{ $gradeHandle->grade }} - {{ $gradeHandle->strand }} ({{ $gradeHandle->section }})</a>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="p-3 {{ request()->is('teacher/class_history') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('teacher.class_history') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-clock-rotate-left"></i>Class History</a>
                </div>


                <!-- <div class="p-3 {{ request()->is('teacher/attendace_sheet') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-sheet-plastic"></i>Attendace Sheet</a>
                </div> -->




                <div class="p-3 {{ request()->is('teacher/grading') || request()->is('teacher/custom_grade') || request()->is('teacher/grading_sheet') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <div class="relative inline-block text-left w-full">
                        <div class="w-full">
                            <button type="button" class="text-sm flex items-center justify-start gap-3 w-full" id="menu-button-3" aria-expanded="true" aria-haspopup="true">
                                <i class="fa-solid fa-graduation-cap"></i> Students Grade
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu-3" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-2" tabindex="-1">
                            <div role="none">
                                <a href="{{ route('teacher.grading') }}" class="{{
                                           request()->is('teacher/grading') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list-ul"></i>
                                    Grading Sheet
                                </a>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="p-3 {{ (request()->is('teacher/attendance/report') || request()->is('teacher/attendance/view_attendance_history/')  || request()->is('teacher/facescan')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <div class="relative inline-block text-left w-full">
                        <div class="w-full">
                            <button type="button" class="text-sm flex items-center justify-start gap-3 w-full" id="menu-button-4" aria-expanded="true" aria-haspopup="true">
                                <i class="fa-solid fa-graduation-cap"></i> Attendance List
                                <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>

                        <div class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu-4" role="menu" aria-orientation="vertical" aria-labelledby="menu-button-2" tabindex="-1">
                            <div role="none">
                                <a href="{{ route('teacher.attendance.report') }}" class="{{
                                           (request()->is('teacher/attendance/report') || request()->is('teacher/attendance/view_attendance_history/')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list-ul"></i>
                                    Attendance Report
                                </a>

                                <a href="{{ route('teacher.facescan') }}" class="{{
                                           request()->is('teacher/facescan') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} block px-4 py-2 text-sm flex items-center justify-start gap-3" role="menuitem" tabindex="-1" id="menu-item-0"><i class="fa-solid fa-list-ul"></i>
                                    Face Scan
                                </a>


                            </div>
                        </div>
                    </div>
                </div>

                <div class="py-2">
                    <hr>
                </div>
                <div class="p-3 {{ request()->is('teacher/chats') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('teacher.chats.index') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-message"></i>Messages <span class="text-rose-600 font-semibold" id="messageCounts">0</span></a>
                </div>
                <script>
                    $(() => {
                        $.ajax({
                            url: '{{ route("teacher.get_message_count") }}',
                            method: 'GET',
                            success: (response) => {
                                $('#messageCounts').text(response.count);
                            }
                        });
                    })
                </script>
                <div class="p-3 {{ request()->is('teacher/notifications') ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('teacher.notification') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-bell"></i>Notifications</a>
                </div>
                <div class="p-3 {{ (request()->is('teacher/settings') || request()->is('teacher/profile')) ? 'bg-blue-50 text-blue-500' : 'hover:bg-blue-50 hover:text-blue-500 text-gray-700' }} rounded">
                    <a href="{{ route('teacher.profile') }}" class="text-sm flex items-center justify-start gap-3"><i class="fa-solid fa-gear"></i>Settings</a>
                </div>
                <div class="p-3 hover:bg-blue-50 hover:text-blue-500 text-gray-700 rounded">
                    <form id="logout-form" action="{{ route('teacher.logout') }}" method="POST">
                        @csrf
                        <button type="button" class="text-sm flex items-center justify-start gap-3" id="logout-btn">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                        </button>
                    </form>
                </div>
                <hr>
                <div class="p-3 text-gray-700">
                    <div class="flex justify-start items-center gap-2">
                        <img src="{{ isset($user->profile) ? asset('storage/' . $user->profile) : 'https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png' }}" alt="User profile" class="rounded-full  object-cover" style="height: 45px; width: 45px;">
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
            const dropzone = document.getElementById('dropzone');
            if (dropzone) {
                document.addEventListener('DOMContentLoaded', () => {
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
            }
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

    @if (session('error'))
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


            $('#menu-button-2').on('click', function() {
                const expanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !expanded);
                $('#dropdown-menu-2').toggleClass('hidden');
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#menu-button-2, #dropdown-menu-2').length) {
                    $('#dropdown-menu-2').addClass('hidden');
                    $('#menu-button-2').attr('aria-expanded', 'false');
                }
            });


            $('#menu-button-3').on('click', function() {
                const expanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !expanded);
                $('#dropdown-menu-3').toggleClass('hidden');
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#menu-button-3, #dropdown-menu-3').length) {
                    $('#dropdown-menu-3').addClass('hidden');
                    $('#menu-button-3').attr('aria-expanded', 'false');
                }
            });


            $('#menu-button-4').on('click', function() {
                const expanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !expanded);
                $('#dropdown-menu-4').toggleClass('hidden');
            });

            $(document).on('click', function(event) {
                if (!$(event.target).closest('#menu-button-4, #dropdown-menu-4').length) {
                    $('#dropdown-menu-4').addClass('hidden');
                    $('#menu-button-4').attr('aria-expanded', 'false');
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
        $(document).ready(function() {
            // Individual checkbox change event
            $('.highlight-checkbox').change(function() {
                if ($(this).is(':checked')) {
                    $(this).closest('tr').addClass('bg-blue-50 text-blue-700');
                } else {
                    $(this).closest('tr').removeClass('bg-blue-50 text-blue-700');
                }
            });

            // Select all checkbox change event
            $('#selectAll').change(function() {
                if ($(this).is(':checked')) {
                    $('.highlight-checkbox').each(function() {
                        $(this).prop('checked', true);
                        $(this).closest('tr').addClass('bg-blue-50 text-blue-700');
                    });
                } else {
                    $('.highlight-checkbox').each(function() {
                        $(this).prop('checked', false);
                        $(this).closest('tr').removeClass('bg-blue-50 text-blue-700');
                    });
                }
            });

            // Uncheck #selectAll if any individual checkbox is unchecked
            $('.highlight-checkbox').change(function() {
                if (!$(this).is(':checked')) {
                    $('#selectAll').prop('checked', false);
                } else if ($('.highlight-checkbox:checked').length === $('.highlight-checkbox').length) {
                    $('#selectAll').prop('checked', true);
                }
            });

            // Delete selected rows
            $('#deleteSelected').click(function() {
                const selectedIds = $('.highlight-checkbox:checked').map(function() {
                    return $(this).data('id');
                }).get();

                if (selectedIds.length > 0) {

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
                            $('#selected_ids').val(selectedIds);
                            $('#deleteSelectedForm').submit();
                        }
                    })
                } else {
                    // alert('No rows selected.');
                    Swal.fire({
                        title: 'No Rows Selected',
                        text: "Please select at least one row to delete.",
                        icon: 'info',
                    });

                }
            });
        });
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


    @yield('scripts')
</body>

</html>
