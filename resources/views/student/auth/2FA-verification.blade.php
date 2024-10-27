@extends('student.layouts.auth')
@section('title', 'Verify OTP')
@section('content')
<form action="{{ route('student.2fa.verify') }}" method="post" class="w-full max-w-md bg-white rounded-lg p-8 mx-auto mt-10 shadow-lg" style="box-shadow: 0 0 0 100vw rgba(0, 0, 0, 0.6);">
    @csrf
    <h2 class="text-2xl font-bold mb-6 text-gray-600">Verify Your OTP Code</h2>
    <p class="mb-4 text-gray-500 text-sm">Please enter the 6-digit code sent to your email to complete the verification.</p>
    
    <div class="mb-6">
        <label for="otp" class="block text-gray-700 font-medium">OTP Code</label>
        <input type="text" id="otp" name="otp" maxlength="6" placeholder="Enter your OTP" class="form-input w-full rounded-lg border-gray-300 focus:ring-2 focus:ring-blue-500 @error('otp') border-red-500 @enderror">
        @error('otp')
        <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition duration-200">Verify OTP</button>
        <p class="text-center mt-4 text-sm text-gray-500">Didn't receive the code? <a href="" class="text-blue-600 hover:underline">Resend Code</a></p>
    </div>
</form>
@endsection
