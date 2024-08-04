@extends('student.layouts.app')

@section('title', 'Enrolled Subjects')

@section('content')
<div class="px-6 py-4">
    <!-- Student Info -->
    <div class="bg-gradient-to-r from-blue-400 to-blue-500 text-white p-4 rounded-lg mb-4">
        <div class="text-2xl font-bold">Kylie Arabello</div>
        <div>HUMSS/Grade 12 - Acacia</div>
    </div>
    
    <!-- Search and Actions -->
    <div class="flex justify-between items-center mb-4">
        <input type="text" placeholder="Search..." class="p-2 border border-gray-300 rounded w-full md:w-1/2">
    </div>
    
    <!-- Enrolled Subjects Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                <tr>
                    <th class="py-3 px-6 text-left">Subject</th>
                    <th class="py-3 px-6 text-left">Teacher</th>
                    <th class="py-3 px-6 text-left">Date and Time</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Social Science
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Sarah N. Ignacio</td>
                    <td class="py-3 px-6 text-left">Monday | 8:00 AM - 11:00 AM</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Oral Communication in Context
                    </td>
                    <td class="py-3 px-6 text-left">Mr. Arnaldo C. Bangkok</td>
                    <td class="py-3 px-6 text-left">Tuesdays | 9:00 AM - 11:00 AM</td>
                </tr>
                <!-- Add more rows as needed -->
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino
                    </td>
                    <td class="py-3 px-6 text-left">Mr. Lander L. Perez</td>
                    <td class="py-3 px-6 text-left">Tuesday | 10:00 AM - 12:00 PM</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Contemporary Philippine Arts from the Regions
                    </td>
                    <td class="py-3 px-6 text-left">Ms. Gabriella L. Asuncion</td>
                    <td class="py-3 px-6 text-left">Monday | 1:00 PM - 2:00 PM</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> General Mathematics
                    </td>
                    <td class="py-3 px-6 text-left">Mrs. Reynallyn O. Salumbades</td>
                    <td class="py-3 px-6 text-left">Wednesday | 8:00 AM - 10:30 PM</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Understanding Culture, Society and Politics
                    </td>
                    <td class="py-3 px-6 text-left">Mr. Vladimir E. Hugo</td>
                    <td class="py-3 px-6 text-left">Wednesday | 11:30 AM - 1:30 PM</td>
                </tr>
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i> Physical Education and Health
                    </td>
                    <td class="py-3 px-6 text-left">Mr. Kian G. Faustino</td>
                    <td class="py-3 px-6 text-left">Wednesday | 2:00 PM - 4:00 PM</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
