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
        HUMSS
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">General Mathematics</div>
            <div>8:00 - 9:00 AM MONDAY</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">Earth and Life Science</div>
            <div>10:00 - 11:00 AM TUESDAY</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">Komunikasyon at Pananaliksik sa Wika at Kulturang Pilipino</div>
            <div>1:00 - 2:00 PM TUESDAY</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">Contemporary Philippine Arts from the Regions</div>
            <div>1:00 - 3:00 PM MONDAY</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">Oral Communication in Context</div>
            <div>2:00 - 3:00 PM FRIDAY</div>
        </div>
        <div class="bg-white shadow p-4 rounded">
            <div class="font-bold">Understanding Culture, Society and Politics</div>
            <div>1:00 - 3:00 PM FRIDAY</div>
        </div>
    </div>
</div>
@endsection
