@extends('student.layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="px-6 py-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Today Subject -->
        <div class="p-4 shadow-md rounded-lg">
            <div class="font-bold text-lg mb-2">Today Subject</div>
            @if ($subjects_today->isEmpty())
            <div class="bg-white p-4 rounded text-center">
                <div class="text-xl font-bold">No Subjects Found!</div>
                <div>You don't have subjects today.</div>
            </div>
            @else
            <div class="grid grid-cols-1 gap-4">
                @foreach ($subjects_today as $subject)
                <div class="text-center p-4 shadow rounded bg-white">{{$subject->subject}}</div>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Enrolled Subjects -->
        <div class="col-span-2 p-4 shadow-md rounded-lg">
            <div class="flex justify-between items-center">
                <div class="font-bold text-lg">Enrolled Subjects</div>
                <a href="#" class="text-blue-500">See all</a>
            </div>
            @if ($enrolled_subjects->isEmpty())
            <div class="bg-white p-4 rounded text-center">
                <div class="text-xl font-bold">No Subjects Found!</div>
                <div>You don't have subjects to display at this time.</div>
            </div>
            @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-2">
                @foreach ($enrolled_subjects as $subject)
                <div class="text-center p-4 shadow rounded bg-white cursor-pointer">{{ $subject->subject }}</div>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <!-- Notification Area -->
    <div class="mt-4 p-4 shadow-md rounded-lg">
        <div class="font-bold text-lg mb-2">Notifications</div>
        <ul class="list-disc pl-5">
            <li>Hello John Doe! You have incomplete Grade in Earth and Life Science</li>
            <li>Hello John Doe! It is almost due date of your task in General Mathematics</li>
            <li>Hello John Doe! Congratulations you have completed your Quiz in General Mathematics!</li>
            <li>Hello John Doe! Sir Clifford GIVEN ASSIGNMENT in General Mathematics!</li>
        </ul>
    </div>
</div>
@endsection