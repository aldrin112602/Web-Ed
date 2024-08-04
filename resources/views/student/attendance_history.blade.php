@extends('student.layouts.app')

@section('title', 'Attendance History')

@section('content')
<div class="px-6 py-4">
    <!-- Search and Actions -->
    <div class="flex justify-between items-center mb-4">
        <input type="text" placeholder="Search..." class="p-2 border border-gray-300 rounded">
        <div>
            <button class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2">Print</button>
            <button class="bg-gray-800 text-white px-4 py-2 rounded">Download</button>
        </div>
    </div>
    
    <!-- Attendance Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Date</th>
                    <th class="py-3 px-6 text-left">Day</th>
                    <th class="py-3 px-6 text-left">Subject</th>
                    <th class="py-3 px-6 text-left">Teacher</th>
                    <th class="py-3 px-6 text-left">Time in</th>
                    <th class="py-3 px-6 text-left">Status</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
            <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">2024-11-21</td>
                    <td class="py-3 px-6 text-left">Monday</td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Graphic Design
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah Ignacio</td>
                    <td class="py-3 px-6 text-left">8:30 AM</td>
                    <td class="py-3 px-6 text-left">Present</td>
                </tr>

                
            </tbody>
        </table>
    </div>
</div>
@endsection
