@extends('admin.layouts.create')

@section('title', 'Account Management | Student List')
@section('content')
<div>
    <div class="container mx-auto p-4 bg-white">
        <!-- Search and Filters -->
        <hr class="my-3">
        <div class="block md:flex flex-col md:flex-row justify-between items-center mb-4 space-y-2 md:space-y-0 md:space-x-4">
            <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                <div class="md:w-3/4 relative">
                    <input type="text" placeholder="Search..." class="form-input rounded w-full pl-8">
                    <i class="fas fa-search absolute text-sm text-slate-400" style="top: 50%; left: 10px; transform: translateY(-50%)"></i>
                </div>
                <select class=" py-2 border rounded-md">
                    <option selected class="hidden" disabled value="">Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                <select class="py-2 border rounded-md">
                    <option>Strand</option>
                </select>
                <select class="py-2 border rounded-md">
                    <option selected class="hidden" disabled value="">Semester</option>
                    <option value="First Semester">First Semester</option>
                    <option value="Second Semester">Second Semester</option>
                </select>
            </div>
            <a href="{{ route('admin.create.teacher') }}" class="px-4 py-2 bg-blue-500 text-white rounded-md">Add Teacher</a>
        </div>

        <hr class="my-3">

        <h1 class="font-semibold text-slate-600">TEACHER LIST</h1>

        <hr class="my-3">
        <p class="text-sm text-slate-500 mb-3">Showing 1 - 100 of 1,700 teachers</p>

        <!-- Teacher List Table -->
        <div id="hotdog" class="overflow-x-auto w-full">
            <table class="w-screen bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="p-4 text-center border">ID No.</th>
                        <th class="p-4 text-center border">Username</th>
                        <th class="p-4 text-center border">Name</th>
                        <th class="p-4 text-center border">Gender</th>
                        <th class="p-4 text-center border">Position</th>
                        <th class="p-4 text-center border">Grade Handle</th>
                        <th class="p-4 text-center border">Subject</th>
                        <th class="p-4 text-center border">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($account_list as $list)
                    <tr>
                        <td class="p-3 text-center border">{{ $list->id_number }}</td>
                        <td class="p-3 text-center border">{{ $list->username }}</td>
                        <td class="p-3 text-center border">{{ $list->name }}</td>
                        <td class="p-3 text-center border">{{ $list->gender }}</td>
                        <td class="p-3 text-center border">{{ $list->position }}</td>
                        <td class="p-3 text-center border">{{ $list->grade_handle }}</td>
                        <td class="p-3 text-center border">
                            <button class="px-2 py-1 bg-indigo-600 text-white rounded-md">View</button>
                        </td>
                        <td class="p-3 text-center border">
                            <button class="px-2 py-1 bg-blue-500 text-white rounded-md">Edit</button>
                            <button class="px-2 py-1 bg-red-500 text-white rounded-md">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection