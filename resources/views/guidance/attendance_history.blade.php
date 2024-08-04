@extends('guidance.layouts.app')

@section('title', 'Attendance History')

@section('content')
<div class="p-4">
    <div class="mb-4">
        <h2 class="text-2xl font-bold text-gray-800">Jenny Rose Perez</h2>
    </div>

    <div class="flex justify-between items-center mb-4">
        <div>
            <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow hover:bg-gray-400">Print</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Excel</button>
        </div>
        <div>
            <input type="text" placeholder="Search" class="w-full p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">Day</th>
                    <th class="px-4 py-2 text-left">Subject</th>
                    <th class="px-4 py-2 text-left">Teacher</th>
                    <th class="px-4 py-2 text-left">Time in</th>
                    <th class="px-4 py-2 text-left">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">8:30 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-500 text-white px-4 py-1 rounded-lg">Present</span>
                    </td>
                </tr>
                <!-- Repeat similar rows as needed -->
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">8:40 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-500 text-white px-4 py-1 rounded-lg">Present</span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">8:50 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-500 text-white px-4 py-1 rounded-lg">Present</span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">9:00 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-500 text-white px-4 py-1 rounded-lg">Present</span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">9:18 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-blue-500 text-white px-4 py-1 rounded-lg">Present</span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">9:15 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-red-500 text-white px-4 py-1 rounded-lg">Absent</span>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">2024-11-21</td>
                    <td class="px-4 py-2">Monday</td>
                    <td class="px-4 py-2">Graphic Design</td>
                    <td class="px-4 py-2">Ms. Sarah Ignacio</td>
                    <td class="px-4 py-2">8:50 AM</td>
                    <td class="px-4 py-2">
                        <span class="bg-red-500 text-white px-4 py-1 rounded-lg">Absent</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
