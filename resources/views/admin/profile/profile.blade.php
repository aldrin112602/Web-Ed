@extends('admin.layouts.create')

@section('title', 'User Profile')
@section('content')
<div class="min-w-full bg-white border-t border-l" style="min-height: 560px">
    <h1 class="text-blue-700 font-semibold p-3 bg-slate-100 border-b">User Profile</h1>
    <div class="md:px-20 px-10">
        <div class="block md:flex items-center justify-between">
            <div class="flex my-2 items-center justify-start gap-3">
                <img src="{{ asset('storage/' . $user->profile) ?? 'https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png' }}" alt="Profile Image" class="mt-2 border bg-white shadow rounded-full object-cover md:w-32 w-24">
                <div>
                    <h1 class="font-semibold text-sm md:text-lg text-blue-900">{{ $user->name }}</h1>
                    <p class="text-gray-600 text-sm">
                        <span class="font-semibold">
                            {{ $user->role }}
                        </span><br>
                        ID NO. {{ $user->id_number }}
                    </p>
                </div>
            </div>
            <div class="flex my-2 items-center justify-start gap-3">
                <button type="submit" class="px-2 bg-blue-900 text-white py-1 rounded hover:bg-blue-600 text-sm">Upload New Photo</button>
                <button type="submit" class=" bg-slate-50 text-slate-800 border py-1 rounded hover:bg-blue-600 text-sm px-2 shadow">Delete</button>
            </div>
        </div>
        <div class="py-3">
            <hr>
        </div>

        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/3 w-full">
                <label for="name" class="block text-gray-700 text-sm mb-1">Name</label>
                <input readonly type="text" id="name" name="name" class="form-input w-full rounded border-gray-300" value="{{ $user->name }}">
            </div>
            <div class="md:w-1/3 w-full">
                <label for="id_number" class="block text-gray-700 text-sm mb-1">ID No.</label>
                <input readonly type="number" id="id_number" name="id_number" class="form-input w-full rounded border-gray-300" value="{{ $user->id_number }}">
            </div>
            <div class="md:w-1/3 w-full">
                <label for="email" class="block text-gray-700 text-sm mb-1">Email</label>
                <input readonly type="text" id="email" name="email" class="form-input w-full rounded border-gray-300" value="{{ $user->email }}">
            </div>
            
        </div>
        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/3 w-full">
                <label for="phone_number" class="block text-gray-700 text-sm mb-1">Phone number</label>
                <input readonly type="number" id="phone_number" phone_number="phone_number" class="form-input w-full rounded border-gray-300" value="{{ $user->phone_number }}">
            </div>
            <div class="md:w-1/3 w-full">
                <label for="username" class="block text-gray-700 text-sm mb-1">Username</label>
                <input readonly type="text" id="username" name="username" class="form-input w-full rounded border-gray-300" value="{{ $user->username }}">
            </div>
            <div class="md:w-1/3 w-full">
                <label for="gender" class="block text-gray-700 text-sm mb-1">Gender</label>
                <input readonly type="text" id="gender" name="gender" class="form-input w-full rounded border-gray-300" value="{{ $user->gender }}">
            </div>
        </div>
        <hr class="my-6">
        <div class="flex my-2 items-center justify-start gap-3">
                <button type="submit" class="px-2 bg-blue-900 text-white py-1 rounded hover:bg-blue-600 text-sm">Edit</button>
                <button type="submit" class=" bg-white text-slate-800 border py-1 rounded hover:bg-blue-600 text-sm px-2 shadow">Save</button>
            </div>
    </div>





</div>
@endsection