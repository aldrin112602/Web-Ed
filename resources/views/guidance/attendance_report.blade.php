@extends('guidance.layouts.app')

@section('title', 'Attendance Report')

@section('content')
<div class="p-4">
    <div class="mb-4 md:w-1/4 block">
        <input type="text" placeholder="Search" class="w-full p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
    </div>

    <div class="mb-4">
        <h2 class="text-2xl font-bold text-blue-600">Report</h2>
        <p class="text-gray-600">Attendance Report</p>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="px-4 py-2 text-left">Student List</th>
                    <th class="px-4 py-2 text-left">Strand</th>
                    <th class="px-4 py-2 text-left">Year Level</th>
                    <th class="px-4 py-2 text-left">Date</th>
                    <th class="px-4 py-2 text-left">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </th>
                    <th class="px-4 py-2 text-left">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr class="border-b">
                    <td class="px-4 py-2">Carla Perez</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">11</td>
                    <td class="px-4 py-2">4/21/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Luis Cruz</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">12</td>
                    <td class="px-4 py-2">5/21/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
                <!-- Repeat similar rows as needed -->
                <tr class="border-b">
                    <td class="px-4 py-2">Carlos Cruz</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">12</td>
                    <td class="px-4 py-2">6/15/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Jenny Perez</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">12</td>
                    <td class="px-4 py-2">4/11/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Katherine Inson</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">11</td>
                    <td class="px-4 py-2">3/4/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="px-4 py-2">Cristine Par</td>
                    <td class="px-4 py-2">ICT</td>
                    <td class="px-4 py-2">12</td>
                    <td class="px-4 py-2">5/7/24</td>
                    <td class="px-4 py-2">
                        <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Generate Report</button>
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">View</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection