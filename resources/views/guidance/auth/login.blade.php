@extends('guidance.layouts.auth')

@section('title', 'Guidance Login')
@section('content')

<form action="{{ route('guidance.handleLogin') }}" method="post" class="w-full max-w-md bg-white  rounded-lg p-8" style="box-shadow: 0 0 10px 100vw rgba(0, 0, 0, 0.4);">
    @csrf

    <h2 class="text-2xl font-bold text-center mb-6 text-gray-500">Guidance Login</h2>
    <div class="mb-4">
        <label for="username" class="block text-gray-700">Username</label>
        <input type="text" id="username" name="username" class="form-input w-full rounded border-gray-300 @error('username') border-red-500 @enderror" value="{{ old('username') }}">
        @error('username')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="password" class="block text-gray-700">Password</label>
        <div class="relative w-full">
            <input type="password" id="password" name="password" class="form-input w-full rounded border-gray-300 @error('password') border-red-500 @enderror" value="{{ old('password') }}">
            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password absolute top-1/2 right-2 transform-translate-y-1/2 cursor-pointer text-gray-600 text-sm mr-2" style="transform: translateY(-47%);"></span>
        </div>

        @error('password')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <input type="checkbox" id="remember" name="remember" class="form-checkbox rounded">
            <label for="remember" class="ml-2 text-gray-700 text-sm">Remember Me</label>
        </div>
        <a href="{{ route('guidance.password.request') }}" class="text-sm text-blue-600 hover:underline font-semibold">Forgot Password?</a>
    </div>


    <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Log In</button>
    </div>
</form>

@endsection