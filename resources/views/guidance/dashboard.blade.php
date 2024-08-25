@extends('guidance.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="flex space-x-4 p-4">
    <div class="flex-1 bg-white rounded-lg shadow p-6 text-center">
        <div class="text-4xl font-bold text-blue-500">
            {{ $total_number_of_students }}
        </div>
        <div class="mt-2 text-gray-600">Total number of students</div>
    </div>
    <div class="flex-1 bg-white rounded-lg shadow p-6 text-center">
        <div class="text-4xl font-bold text-blue-500">10</div>
        <div class="mt-2 text-gray-600">Late Arrival</div>
    </div>
    <div class="flex-1 bg-white rounded-lg shadow p-6 text-center">
        <div class="text-4xl font-bold text-blue-500">12</div>
        <div class="mt-2 text-gray-600">Absent</div>
    </div>
    <div class="flex-1 bg-white rounded-lg shadow p-6 text-center">
        <div class="text-4xl font-bold text-blue-500">30</div>
        <div class="mt-2 text-gray-600">Present</div>
    </div>
</div>
@endsection
