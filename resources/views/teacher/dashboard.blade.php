@extends('teacher.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mx-auto p-4 text-slate-700">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white shadow p-4 rounded">
            <div class="text-2xl font-bold">52</div>
            <div>Total number of students</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="text-2xl font-bold">10</div>
            <div>Late Arrival</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="text-2xl font-bold">12</div>
            <div>Absent</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="text-2xl font-bold">30</div>
            <div>Present</div>
        </div>
    </div>

    <div class="bg-blue-500 text-white p-4 rounded my-4">
        Grade {{$user->grade_handle}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($allSubjects as $subject)
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">{{ $subject->subject }}</div> 
            <div>{{ $subject->time }} {{ strtoupper($subject->day) }}</div>
        </div>
        @endforeach
    </div>

</div>
@endsection