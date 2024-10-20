<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher')</title>
    @vite('resources/css/app.css')
    <style>
        body {
            background-image: url("{{ asset('images/admin_auth_bg.png') }}");
            background-size: 100vw 100vh;
            background-repeat: no-repeat;
        }
    </style>

    <!-- <link rel="manifest" href="{{ asset('manifest.json') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">
    <main class="min-h-screen flex items-center justify-center rounded">
        @yield('content')


        <!-- Modal for Terms and Conditions -->
        <div id="termsModal" class="fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen">
                <div class="bg-white rounded-lg shadow-xl overflow-hidden max-w-lg w-full">
                    <div class="px-6 py-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                            Terms and Conditions
                        </h3>
                        <hr class="my-3">
                        <div class="mt-2" style="max-height: 400px; overflow-y: auto">
                            <p class="text-sm text-gray-500">
                                Welcome to the WebEd System! We're thrilled to have you join our platform dedicated to revolutionizing education through technology. Before you begin your journey with us, it's essential to understand the terms of use outlined in this agreement. By accessing or using WebEd, you agree to abide by these terms and conditions.
                            </p>
                            <br>
                            <h4 class="text-md font-semibold text-gray-900">User Agreement:</h4>
                            <p class="text-sm text-gray-500">
                                As a user of the WebEd System, you must be a student of ark and agree to maintain the confidentiality of your account credentials. Your access to and use of our platform is subject to compliance with these terms and all applicable laws and regulations. You acknowledge that any violation of these terms may result in the termination of your account.
                            </p>
                            <br>
                            <h4 class="text-md font-semibold text-gray-900">Terms and Conditions:</h4>
                            <ul class="text-sm text-gray-500 list-disc list-inside">
                                <li>Users are prohibited from modifying, reproducing, or distributing the content provided on WebEd without prior consent, as it is protected by intellectual property laws.</li>
                                <li>Your use of WebEd is also governed by our Privacy Policy, which outlines how we collect, use, and disclose your personal information.</li>
                                <li>While we strive to provide uninterrupted access to our platform, we do not guarantee its continuous availability or that it will be error-free. Your use of WebEd is at your own risk.</li>
                                <li>By using WebEd, you agree to indemnify and hold harmless our platform and its affiliates from any claims, damages, or liabilities arising from your use of the platform or violation of these terms.</li>
                                <li>These terms and conditions are governed by the laws of [Jurisdiction], and any disputes arising under these terms shall be resolved in the courts of [Jurisdiction].</li>
                                <li>WebEd reserves the right to update these terms and conditions at any time without prior notice. Continued use of the platform after such changes constitutes acceptance of the modified terms.</li>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="bg-gray-50 px-6 py-4 flex justify-end">
                        <button type="button" class="text-gray-700 bg-gray-300 border border-gray-300 rounded-md px-4 py-2 hover:bg-gray-100" id="closeModal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#termsTrigger').on('click', function(event) {
                    event.preventDefault();
                    $('#termsModal').removeClass('hidden');
                });
                $('#closeModal').on('click', function() {
                    $('#termsModal').addClass('hidden');
                });
                $('#agreeTerms').on('change', function() {
                    if ($(this).is(':checked')) {
                        $('#loginButton').removeClass('bg-gray-300 text-black').addClass('bg-blue-500 text-white hover:bg-blue-600').removeAttr('disabled');
                    } else {
                        $('#loginButton').removeClass('bg-blue-500 text-white hover:bg-blue-600').addClass('bg-gray-300 text-black').attr('disabled', 'disabled');
                    }
                });
            });
        </script>
    </main>
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