@extends('student.layouts.app')

@section('title', 'Grades')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md h-full">
    <!-- Search and Actions -->
    <div class="flex justify-between items-center mb-4">
        <div class="relative">
            <input type="text" placeholder="Search" class="form-input pl-4 pr-10 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
            <i class="fas fa-search absolute pointer-events-none right-5 top-3 text-slate-500"></i>
        </div>
        <div>
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-4 rounded-md mr-2">PRINT</button>
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md">DOWNLOAD GRADE</button>
        </div>
    </div>

    <!-- Grades Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="text-left px-6 py-3 border-b border-gray-300">First Name</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">Last Name</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">Strand</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">1st Sem</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">2nd Sem</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">Remarks</th>
                    <th class="text-left px-6 py-3 border-b border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300">{{strtoupper(explode(' ', $user->name)[0])}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">{{strtoupper(explode(' ', $user->name)[1])}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">{{ $user->strand}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">90</td>
                    <td class="px-6 py-4 border-b border-gray-300">91</td>
                    <td class="px-6 py-4 border-b border-gray-300">Passed</td>
                    <td class="px-6 py-4 border-b border-gray-300">
                        <a href="#" download class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-md mr-2">Download</a>
                        <a href="{{route('student.viewGrades')}}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-md">View</a>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300">{{strtoupper(explode(' ', $user->name)[0])}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">{{strtoupper(explode(' ', $user->name)[1])}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">{{ $user->strand}}</td>
                    <td class="px-6 py-4 border-b border-gray-300">90</td>
                    <td class="px-6 py-4 border-b border-gray-300">88</td>
                    <td class="px-6 py-4 border-b border-gray-300">Passed</td>
                    <td class="px-6 py-4 border-b border-gray-300">
                        <a href="#" download class="bg-blue-500 hover:bg-blue-600 text-white py-1 px-4 rounded-md mr-2">Download</a>
                        <a href="{{route('student.viewGrades')}}" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded-md">View</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection