@extends('admin.layouts.create')

@section('title', 'Edit Student')
@section('content')
<div>
    <div class="container mx-auto p-4 bg-white">
        <h1 class="font-semibold text-slate-600 mb-4">Edit Student</h1>
        <form method="POST" action="{{ route('admin.update.student', $student->id) }}">
            @csrf
            @method('PUT')
            <!-- Add form fields for student data -->
            <div class="mb-4">
                <label class="block text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $student->name }}" class="form-input mt-1 block w-full">
            </div>
            <!-- Add more fields as needed -->
            <div class="mb-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
