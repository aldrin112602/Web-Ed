@extends('student.layouts.app')

@section('title', 'User Profile')
@section('content')
<div class="min-w-full bg-white border-t border-l" style="min-height: 560px">
    <h1 class="text-blue-700 font-semibold p-3 bg-slate-100 border-b">User Profile</h1>
    <div class="md:px-20 px-10">
        <div class="block md:flex items-center justify-between">
            <div class="flex my-2 items-center justify-start gap-3">
                <div>
                    <label for="profile_photo" class="cursor-pointer">
                    <img src="{{ isset($user->profile) ? asset('storage/' . $user->profile) : 'https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png' }}" alt="Profile Image" class="mt-2 border bg-white shadow rounded-full object-cover" style="height: 80px; width: 80px">

                    </label>
                </div>
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
            <button class="px-4 py-2 rounded bg-blue-600 text-white"><i class="fas fa-info-circle text-slate-100" title="If you find there's wrong information about your profile details, just make a request, thank you!"></i> | Request profile update</button>
        </div>

        <div class="py-3">
            <hr>
        </div>
        <h1 class="font-bold text-gray-600">Personal info</h1>
        <form action="{{ route('student.updateAccount') }}" method="post" id="personal_info">
            @csrf
            @method('PUT')
            <div class="block md:flex align-center justify-between my-2 gap-5">
                <div class="md:w-1/3 w-full">
                    <label for="name" class="block text-gray-700 text-sm mb-1 mt-2">Name</label>
                    <input readonly type="text" id="name" name="name" class="form-input w-full rounded border-gray-300 @error('name') border-red-500 @enderror" value="{{ old('name') ?? $user->name }}">
                    @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="md:w-1/3 w-full">
                    <label for="extension_name" class="block text-gray-700 text-sm mb-1 mt-2">Extension Name (Optional)</label>
                    <input readonly type="text" id="extension_name" name="extension_name" class="form-input w-full rounded border-gray-300 @error('extension_name') border-red-500 @enderror" value="{{ old('extension_name') ?? $user->extension_name }}">
                    @error('extension_name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                

                
                <div class="md:w-1/3 w-full">
                    <label for="id_number" class="block text-gray-700 text-sm mb-1 mt-2">ID No.</label>
                    <input readonly type="number" id="id_number" name="id_number" class="form-input w-full rounded border-gray-300 @error('id_number') border-red-500 @enderror" value="{{ old('id_number') ?? $user->id_number }}">
                    @error('id_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                
            </div>
            <div class="block md:flex align-center justify-between my-2 gap-5">
                <div class="md:w-1/3 w-full">
                    <label for="phone_number" class="block text-gray-700 text-sm mb-1 mt-2">Phone number</label>
                    <input readonly type="tel" id="phone_number" name="phone_number" oninput="if(this.value.length > 11) this.value = this.value.slice(0, 11);"  class="form-input w-full rounded border-gray-300 @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') ?? $user->phone_number }}">
                    @error('phone_number')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                <div class="md:w-1/3 w-full">
                    <label for="email" class="block text-gray-700 text-sm mb-1 mt-2">Email</label>
                    <input readonly type="text" id="email" name="email" class="form-input w-full rounded border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') ?? $user->email }}">
                    @error('email')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>


                
                <div class="md:w-1/3 w-full">
                    <label for="gender" class="block text-gray-700 text-sm mb-1 mt-2">Gender</label>
                    <input readonly type="text" id="gender" name="gender" class="form-input w-full rounded border-gray-300 @error('gender') border-red-500 @enderror" value="{{ old('gender') ?? $user->gender }}">
                    @error('gender')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                    <label for="username" class="block text-gray-700 text-sm mb-1 mt-2">Username</label>
                    <input readonly type="text" id="username" name="username" class="form-input w-full rounded border-gray-300 @error('username') border-red-500 @enderror" value="{{ old('username') ?? $user->username }}">
                    @error('username')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            <div class="md:w-1/2 w-full">
                    <label for="address" class="block text-gray-700 text-sm mb-1 mt-2">Address</label>
                    <input readonly type="text" id="address" name="address" class="form-input w-full rounded border-gray-300 @error('address') border-red-500 @enderror" value="{{ old('address') ?? $user->address }}">
                    @error('address')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            

        </form>
        
        <hr class="my-6">
        <br><br><br>
    </div>





</div>
@endsection