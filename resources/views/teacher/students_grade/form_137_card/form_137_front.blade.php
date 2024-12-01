@extends('teacher.layouts.app')
@section('title', 'Form 137')
@section('content')
<div class="mx-auto p-4 bg-white overflow-auto">
    <div class="flex my-3 gap-3">
        <button onclick="window.print()" class="px-5 py-1 bg-blue-800 text-white rounded">Print Report Card</button>
        |
        <a href="{{ route('teacher.form_137_front', $student->id) }}?id={{request()->query('id')}}" class="px-5 py-1 bg-green-800 text-white rounded">Front page</a>
        <a href="{{ route('teacher.form_137_back', $student->id) }}?id={{request()->query('id')}}" class="px-5 py-1 bg-purple-800 text-white rounded">Back page</a>
    </div>

    <div id="form_137" class="border p-8 shadow-lg">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <div class="flex justify-center gap-3 items-center mb-2">
                <img src="{{ asset('images/deped_logo.png') }}" alt="Logo 1" class="h-16">
                <h1 class="text-lg font-bold">REPUBLIC OF THE PHILIPPINES<br>DEPARTMENT OF EDUCATION</h1>
                <img src="{{ asset('images/ark_logo.png') }}" alt="Logo 2" class="h-16">
            </div>
            <h2 class="text-xl font-bold uppercase">Senior High School Student Permanent Record</h2>
        </div>

        <!-- Learner's Information Section -->
        <div class="border-t pt-4">
            <h3 class="text-lg font-bold mb-2 text-center py-1 bg-slate-300">Learner's Information</h3>
            <div class="grid grid-cols-3 gap-4">
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Last Name:</label>
                    <input value="{{ explode(' ', $student->name)[count(explode(' ', $student->name)) - 1] }}" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">First Name:</label>
                    <input value="{{ explode(' ', $student->name)[0] }}" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Middle Name:</label>
                    <input type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">LRN:</label>
                    <input value="{{ $student->lrn }}" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Date of Birth (MM/DD/YYYY):</label>
                    <input value="{{ $student->birthdate }}" type="date" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Sex:</label>
                    <select class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Eligibility Section -->
        <div class="border-t pt-4 mt-4">
            <h3 class="text-lg font-bold mb-2 text-center py-1 bg-slate-300">Eligibility for SHS Enrollment</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">High School Completer</label>
                    <input type="checkbox" class="mr-2"> General Ave:
                    <input type="text" class="border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1 w-24">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Date of Graduation/Completion:</label>
                    <input type="date" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Junior High School Completer</label>
                    <input type="checkbox" class="mr-2"> Name of School:
                    <input type="text" class="border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1 w-48">
                </div>
            </div>
        </div>

        <!-- Scholastic Record Section -->
        <div class="border-t pt-4 mt-4">
            <h3 class="text-lg font-bold mb-2 text-center py-1 bg-slate-300">Scholastic Record</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">School:</label>
                    <input value="Ark Technological Institute Education System Inc" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">School ID:</label>
                    <input value="405210" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Track/Strand:</label>
                    @php
                    $strands = [
                    'ICT' => 'Information and Communication Techonology'
                    ]
                    @endphp
                    <input value="{{ $strands[$student->strand] }}" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Grade and Section:</label>
                    <input value="Grade {{ $student->grade }} / Section {{ $student->section }}" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">SY:</label>
                    <input value="2024 - 2025" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
                <div class="flex items-center justify-start">
                    <label class="font-semibold" style="font-size: smaller;">Sem:</label>
                    <input value="First Semester" type="text" class="w-full border-0 border-b border-gray-300 focus:outline-none focus:ring-0 focus:border-blue-600 p-1">
                </div>
            </div>
        </div>

        <div class="mb-8">
                <table class="w-full border-collapse border border-gray-400 mb-8">
                    <thead>
                        <tr>
                            <th rowspan="1" class="border border-gray-400 p-2 w-1/2">Subjects</th>
                            <th colspan="2" class="border border-gray-400 p-2 text-center">Quarter</th>
                            <th rowspan="1" class="border border-gray-400 p-2">Semester Final Grade</th>
                        </tr>
                        <tr>
                            <th class="border border-gray-400 p-2"></th>
                            <th class="border border-gray-400 p-2 w-16 text-center">1</th>
                            <th class="border border-gray-400 p-2 w-16 text-center">2</th>
                            <th class="border border-gray-400 p-2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grades['First Semester_First Quarter'] as $firstQuarter)
                        <tr>
                            <td class="border border-gray-400 p-2 text-center">{{ $firstQuarter->subject }}</td>
                            <td class="border border-gray-400 p-2 text-center">{{ $firstQuarter->quarterly_grade }}</td>
                            <td class="border border-gray-400 p-2 text-center">
                                {{ optional($grades['First Semester_Second Quarter']->firstWhere('subject', $firstQuarter->subject))->quarterly_grade ?? 'N/A' }}
                            </td>
                            <td class="border border-gray-400 p-2 text-center">
                                {{
                        ($firstQuarter->quarterly_grade +
                        optional($grades['First Semester_Second Quarter']->firstWhere('subject', $firstQuarter->subject))->quarterly_grade) / 2
                    }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
</div>
@endsection