@extends('admin.layouts.dashboard')

@section('title', 'Create Admin Account')
@section('content')
<div class="text-slate-100 p-2 bg-blue-400">Create Admin Account</div>
<div class="min-w-full flex items-center justify-center p-6" style="min-height: 560px">
    <form action="{{ route('admin.handleCreate.admin') }}" method="post" class="w-full max-w-3xl bg-white rounded-lg p-8 shadow">
        @csrf

        <div class="w-full">
            <label for="id_number" class="block text-gray-700 text-sm mb-1">ID number</label>
            <input type="number" id="id_number" name="id_number" class="form-input w-full rounded border-gray-300 @error('id_number') border-red-500 @enderror" value="{{ old('id_number') }}">
            @error('id_number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="name" class="block text-gray-700 text-sm mb-1">Name</label>
                <input type="text" id="name" name="name" class="form-input w-full rounded border-gray-300 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="gender" class="block text-gray-700 text-sm mb-1">Gender</label>
                <select name="gender" id="gender" class="form-select w-full rounded border-gray-300 @error('gender') border-red-500 @enderror">
                    <option value="" disabled class="hidden" selected>-- Select one --</option>
                    <option value="Male" {{ old('gender') == "Male" ? "selected" : ""  }}>Male</option>
                    <option value="Female" {{ old('gender') == "Female" ? "selected" : ""  }}>Female</option>
                </select>
                @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="py-6">
            <hr>
        </div>
        <h1>User Account</h1>
        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="username" class="block text-gray-700 text-sm mb-1">Username</label>
                <input type="text" id="username" name="username" class="form-input w-full rounded border-gray-300 @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="password" class="block text-gray-700 text-sm mb-1">Password</label>
                <div class="relative w-full">
                    <input type="password" id="password" name="password" class="form-input w-full rounded border-gray-300 @error('password') border-red-500 @enderror" value="{{ old('password') }}">
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password absolute top-1/2 right-2 transform-translate-y-1/2 cursor-pointer text-gray-600 text-sm mr-2" style="transform: translateY(-47%);"></span>
                </div>
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full md:w-40 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Add account</button>
        </div>
    </form>
</div>
@endsection