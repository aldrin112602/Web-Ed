@extends('teacher.layouts.app')

@section('title', 'Grading')

@section('content')
<div class="p-8">
    <!-- Header Section -->
    <div class="grid grid-cols-3 gap-4 text-sm mb-4">
        <div class="flex flex-col">
            <span>Region: <span class="font-semibold">IV - A</span></span>
            <span>Division: <span class="font-semibold">2nd</span></span>
        </div>
        <div class="flex flex-col">
            <span>School Name: <span class="font-semibold">Ark Technological Institute Education System Inc.</span></span>
        </div>
        <div class="flex flex-col">
            <span>School ID: <span class="font-semibold">405210</span></span>
            <span>School Year: <span class="font-semibold">2023-2024</span></span>
        </div>
    </div>

    <!-- Table Section -->
    <div class="border border-gray-300">
        <div class="flex bg-gray-200 p-2">
            <div class="flex-1 text-center">First Quarter</div>
            <div class="flex-1 text-center">Grade & Section:</div>
            <div class="flex items-center p-2">
                <label class="mr-2">Semester:</label>
                <select class="border border-gray-300 p-1 rounded">
                    <option>1st</option>
                    <option>2nd</option>
                </select>
            </div>
            <div class="flex flex-col items-center justify-center p-2">
                <label>Track:</label>
                <select class="border border-gray-300 p-1 rounded">
                    <option>Core Subject(All Tracks)</option>
                    <option>Academic Track (except Immersion)</option>
                    <option>Work Immersion/Culminating Activities (for Academic Track)</option>
                    <option>TVL/Sports/Arts and Design Track</option>
                    <option>Custom</option>
                </select>
            </div>
        </div>

        <!-- Learner's Names Section -->
        <div class="grid grid-cols-3 divide-x">
            <div class="col-span-1 bg-gray-200 p-2 text-center">
                <span>Learner's Names</span>
            </div>
            <div class="col-span-2">
                <div class="grid grid-cols-2 divide-x">
                    <div class="text-center p-2 bg-gray-300">Male</div>
                    <div class="text-center p-2 bg-gray-300">Female</div>
                </div>
                <div class="grid grid-cols-2 divide-x divide-y">
                    <div class="p-2">James Reyes</div>
                    <div class="p-2">Katherine Inson</div>
                    <div class="p-2">Aldrin Santos</div>
                    <div class="p-2">Jem Perez</div>
                    <div class="p-2"></div>
                    <div class="p-2">Christine Par</div>
                    <div class="p-2"></div>
                    <div class="p-2">Saira Vergara</div>
                    <div class="p-2"></div>
                    <div class="p-2">Kim Villaruel</div>
                    <div class="p-2"></div>
                    <div class="p-2">Cielo Sucio</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
