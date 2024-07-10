@extends('admin.layouts.dashboard')

@section('title', 'Create Teacher Account')
@section('content')
<div class="text-slate-100 p-2 bg-blue-400">Create Teacher Account</div>
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
                                <input type="number" id="name" name="name" class="form-input w-full rounded border-gray-300 @error('name') border-red-500 @enderror" value="{{ old('name') }}">
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

                <div class="block md:flex align-center justify-between my-2 gap-5">
                        <div class="md:w-1/2 w-full">
                                <label for="position" class="block text-gray-700 text-sm mb-1">position</label>
                                <select name="position" id="position" class="form-select w-full rounded border-gray-300 @error('position') border-red-500 @enderror">
                                        <option value="" disabled class="hidden" selected>-- Select one --</option>
                                        <option value="Teacher 1" {{ old('position') == "Teacher 1" ? "selected" : ""  }}>Teacher 1</option>
                                        <option value="Teacher 2" {{ old('position') == "Teacher 2" ? "selected" : ""  }}>Teacher 2</option>
                                        <option value="Teacher 3" {{ old('position') == "Teacher 3" ? "selected" : ""  }}>Teacher 3</option>
                                </select>
                                @error('position')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="md:w-1/2 w-full">
                                <label for="grade_handle" class="block text-gray-700 text-sm mb-1">Grade handle</label>
                                <select name="grade_handle" id="grade_handle" class="form-select w-full rounded border-gray-300 @error('grade_handle') border-red-500 @enderror">
                                        <option value="" disabled class="hidden" selected>-- Select one --</option>
                                        <optgroup label="G11">
                                                <option value="11 ABM" {{ old('grade_handle') == "11 ABM" ? "selected" : "" }}>ABM</option>
                                                <option value="11 ICT" {{ old('grade_handle') == "11 ICT" ? "selected" : "" }}>ICT</option>
                                                <option value="11 HUMSS" {{ old('grade_handle') == "11 HUMSS" ? "selected" : "" }}>HUMSS</option>
                                                <option value="11 H.E" {{ old('grade_handle') == "11 H.E" ? "selected" : "" }}>H.E</option>
                                        </optgroup>
                                        <optgroup label="G12">
                                                <option value="12 ABM" {{ old('grade_handle') == "12 ABM" ? "selected" : "" }}>ABM</option>
                                                <option value="12 ICT" {{ old('grade_handle') == "12 ICT" ? "selected" : "" }}>ICT</option>
                                                <option value="12 HUMSS" {{ old('grade_handle') == "12 HUMSS" ? "selected" : "" }}>HUMSS</option>
                                                <option value="12 H.E" {{ old('grade_handle') == "12 H.E" ? "selected" : "" }}>H.E</option>
                                        </optgroup>
                                </select>

                                @error('grade_handle')
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