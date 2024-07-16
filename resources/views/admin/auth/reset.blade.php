@extends('admin.layouts.auth')

@section('title', 'Admin Reset Password')

@section('content')
<form action="{{ route('admin.password.update') }}" method="post" class="w-full max-w-md bg-white rounded-lg p-8">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    <h2 class="text-2xl font-bold text-center mb-6">New Password</h2>
    <p class="text-sm text-gray-400 mb-4">Set the new password for your account.</p>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email Address</label>
        <input type="email" id="email" name="email" class="form-input w-full rounded border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') }}" required>
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <input type="password" id="password" name="password" class="form-input w-full rounded border-gray-300 @error('password') border-red-500 @enderror" required>
        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4">
        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-input w-full rounded border-gray-300 @error('password_confirmation') border-red-500 @enderror" required>
        @error('password_confirmation')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Reset Password</button>
    </div>
</form>
@endsection
