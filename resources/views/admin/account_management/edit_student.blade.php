@extends('admin.layouts.create')

@section('title', 'Update Student Account')
@section('content')
<div class="text-slate-100 p-2 bg-blue-400">Update Student Account</div>
<div class="min-w-full flex items-center justify-center p-6" style="min-height: 560px">
    <form enctype="multipart/form-data" action="{{ route('admin.update.student', $student->id) }}" method="post" class="w-full max-w-3xl bg-white rounded-lg p-8 shadow">
        @csrf
        @method('PUT')
        <div class="w-full">
            <label for="id_number" class="block text-gray-700 text-sm mb-1">ID number</label>
            <input type="number" id="id_number" name="id_number" class="form-input w-full rounded border-gray-300 @error('id_number') border-red-500 @enderror" value="{{ old('id_number') ?? $student->id_number }}">
            @error('id_number')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="name" class="block text-gray-700 text-sm mb-1">Name</label>
                <input type="text" id="name" name="name" class="form-input w-full rounded border-gray-300 @error('name') border-red-500 @enderror" value="{{ old('name') ?? $student->name }}">
                @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="gender" class="block text-gray-700 text-sm mb-1">Gender</label>
                <select name="gender" id="gender" class="form-select w-full rounded border-gray-300 @error('gender') border-red-500 @enderror">
                    <option value="" disabled class="hidden" selected>-- Select one --</option>
                    <option value="Male" {{ (old('gender') ?? $student->gender) == "Male" ? "selected" : ""  }}>Male</option>
                    <option value="Female" {{ (old('gender') ?? $student->gender) == "Female" ? "selected" : ""  }}>Female</option>
                </select>
                @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="strand" class="block text-gray-700 text-sm mb-1">Strand</label>
                <select name="strand" id="strand" class="form-select w-full rounded border-gray-300 @error('strand') border-red-500 @enderror">
                    <option value="" disabled class="hidden" selected>-- Select one --</option>
                    <option value="ABM" {{ (old('strand') ?? $student->strand) == "ABM" ? "selected" : ""  }}>ABM</option>
                    <option value="ICT" {{ (old('strand') ?? $student->strand) == "ICT" ? "selected" : ""  }}>ICT</option>
                    <option value="H.E" {{ (old('strand') ?? $student->strand) == "H.E" ? "selected" : ""  }}>HE</option>
                    <option value="HUMSS" {{ (old('strand') ?? $student->strand) == "HUMSS" ? "selected" : ""  }}>HUMSS</option>
                </select>
                @error('strand')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="md:w-1/2 w-full">
                <label for="grade" class="block text-gray-700 text-sm mb-1">Grade</label>
                <select name="grade" id="grade" class="form-select w-full rounded border-gray-300 @error('grade') border-red-500 @enderror">
                    <option value="" disabled class="hidden" selected>-- Select one --</option>
                    <option value="11" {{ (old('grade') ?? $student->grade) == "11" ? "selected" : ""  }}>Grade 11</option>
                    <option value="12" {{ (old('grade') ?? $student->grade) == "12" ? "selected" : ""  }}>Grade 12</option>
                </select>
                @error('grade')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

        </div>
        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="parents_contact_number" class="block text-gray-700 text-sm mb-1">Parents contact number</label>
                <input type="tel" id="parents_contact_number" name="parents_contact_number" class="form-input w-full rounded border-gray-300 @error('parents_contact_number') border-red-500 @enderror" value="{{ old('parents_contact_number') ?? $student->parents_contact_number }}">
                @error('parents_contact_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="address" class="block text-gray-700 text-sm mb-1">Address</label>
                <input type="tel" id="address" name="address" class="form-input w-full rounded border-gray-300 @error('address') border-red-500 @enderror" value="{{ old('address') ?? $student->address }}">
                @error('parents_contact_number')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>


        <div class="block md:flex align-center justify-between my-2 gap-5">
            <div class="md:w-1/2 w-full">
                <label for="email" class="block text-gray-700 text-sm mb-1">Email</label>
                <input type="email" id="email" name="email" class="form-input w-full rounded border-gray-300 @error('email') border-red-500 @enderror" value="{{ old('email') ?? $student->email }}">
                @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="phone_number" class="block text-gray-700 text-sm mb-1">Phone number</label>
                <input type="tel" id="phone_number" name="phone_number" class="form-input w-full rounded border-gray-300 @error('phone_number') border-red-500 @enderror" value="{{ old('phone_number') ?? $student->phone_number }}">
                @error('phone_number')
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
                <input type="text" id="username" name="username" class="form-input w-full rounded border-gray-300 @error('username') border-red-500 @enderror" value="{{ old('username') ?? $student->username }}">
                @error('username')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="md:w-1/2 w-full">
                <label for="password" class="block text-gray-700 text-sm mb-1">Create New Password</label>
                <div class="relative w-full">
                    <input type="password" id="password" name="new_password" class="form-input w-full rounded border-gray-300 @error('password') border-red-500 @enderror" value="{{ old('password') }}">
                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password absolute top-1/2 right-2 transform-translate-y-1/2 cursor-pointer text-gray-600 text-sm mr-2" style="transform: translateY(-47%);"></span>
                </div>
                @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <label for="file-upload" class="block text-gray-700 text-sm mb-1">Upload New Profile</label>
        <div class="w-full relative border-2 border-gray-300 border-dashed rounded-lg p-6 cursor-pointer @error('profile') border-red-500 @enderror" id="dropzone">
            <input id="file-upload" name="profile" type="file" class="absolute inset-0 w-full h-full opacity-0 z-50" accept="image/*" />
            <div class="text-center">
                <img class="mx-auto h-12 w-12" src="https://www.svgrepo.com/show/357902/image-upload.svg" alt="">
                <h3 class="mt-2 text-sm font-medium text-gray-900">
                    <label for="file-upload" class="relative cursor-pointer">
                        <span>Drag and drop</span>
                        <span class="text-indigo-600"> or browse</span>
                        <span>to upload</span>
                    </label>
                </h3>
                <p class="mt-1 text-xs text-gray-500">
                    PNG, JPG, GIF up to 10MB
                </p>
            </div>
            <img src="" class="mt-4 mx-auto max-h-40 hidden" id="preview">
        </div>
        @error('profile')
        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
        @enderror



        <div class="mt-6">
            <button type="submit" class="w-full md:w-40 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Save changes</button>
        </div>
    </form>
</div>
@endsection