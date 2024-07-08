@extends('admin.layouts.auth')

@section('title', 'Admin Signup')

@section('content')
<div class="flex justify-center items-center min-h-screen  py-5">
    <form action="{{ route('admin.handleSignup') }}" method="post" class="w-full max-w-md bg-white rounded-lg p-8 shadow-lg">
        @csrf

        <h2 class="text-2xl font-bold text-center mb-6 text-gray-500">Admin Signup</h2>

        <!-- Full Name -->
        <div class="mb-4">
            <label for="fullname" class="block text-gray-700">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="form-input w-full rounded border-gray-300 @error('fullname') border-red-500 @enderror" value="{{ old('fullname') }}" required>
            @error('fullname')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Role (Example: Admin, User, etc.) -->
        <div class="mb-4">
            <label for="role" class="block text-gray-700">Role</label>
            <input type="text" id="role" name="role" class="form-input w-full rounded border-gray-300 @error('role') border-red-500 @enderror" value="{{ old('role') }}" required>
            @error('role')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email Address</label>
            <input type="email" id="email" name="email" class="form-input w-full rounded border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Phone Number -->
        <div class="mb-4">
            <label for="number" class="block text-gray-700">Phone Number</label>
            <input type="text" id="number" name="number" class="form-input w-full rounded border-gray-300 @error('number') border-red-500 @enderror" value="{{ old('number') }}" required>
            @error('number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="block text-gray-700">Password</label>
            <input type="password" id="password" name="password" class="form-input w-full rounded border-gray-300 @error('password') border-red-500 @enderror" required>
            @error('password')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex items-center">
            <input required type="checkbox" id="termsAndConditions" name="termsAndConditions" class="form-checkbox rounded">
            <label for="termsAndConditions" class="ml-2 text-gray-700 text-sm">I have read and accept the <a href="#!" class="text-sm hover:underline text-blue-600 hover:text-blue-800 font-semibold">Terms and Condition</a></label>
        </div>

        <!-- Signup Button -->
        <div class="mt-5">
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Sign Up</button>
            <p class="text-sm mt-3 text-center">All have an account? <a href="{{ route('admin.login') }}" class="hover:underline hover:text-blue-800 text-blue-600 font-semibold">Log In</a></p>
        </div>
    </form>
</div>
@endsection