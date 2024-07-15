@extends('admin.layouts.auth')

@section('title', 'Admin Forgot Password')
@section('content')

<form action="{{ route('admin.password.email') }}" method="post" class="w-full max-w-md bg-white  rounded-lg p-8" style="box-shadow: 0 0 10px 100vw rgba(0, 0, 0, 0.4);">
    @csrf
    @method('POST')

    <h2 class="text-2xl font-bold text-center mb-6 text-gray-500">Forgot Password</h2>
    <p class="text-sm text-gray-400">Enter your email for verification proccess</p>
    <div class="mb-4">
        <label for="email" class="block text-gray-700">Email</label>
        <input type="email" id="email" name="email" class="form-input w-full rounded border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') }}">
        @error('email')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Continue</button>
    </div>
</form>

@endsection