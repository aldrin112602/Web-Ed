@extends('teacher.layouts.app')

@section('title', 'Grading Sheet')

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
            <div class="flex items-center">
                <span>School Year: </span>
                <select class="ml-2 border border-gray-300 p-1 rounded">
                    <option>2023-2024</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="border border-gray-300">
        <div class="flex bg-gray-200 p-2">
            <div class="flex-1 text-center">First Quarter</div>
            <div class="flex-1 text-center">
                <span>Grade & Section: <span class="font-semibold">11 - Divera</span></span>
            </div>
            <div class="flex-1 text-center">
                <span>Teacher: <span class="font-semibold">Sarah Aquino</span></span>
            </div>
        </div>

        <!-- Grading Sheet Header -->
        <div class="grid grid-cols-2 border-b border-gray-300">
            <div class="text-center border-r border-gray-300 p-2 font-semibold">WRITTEN WORK (25%)</div>
            <div class="text-center p-2 font-semibold">PERFORMANCE TASK (50%)</div>
        </div>

        <!-- Grading Sheet Columns -->
        <div class="grid grid-cols-12 text-center border-b border-gray-300 font-semibold text-sm">
            <!-- WRITTEN WORK COLUMNS -->
            <div class="p-2">1</div>
            <div class="p-2">2</div>
            <div class="p-2">3</div>
            <div class="p-2">4</div>
            <div class="p-2">5</div>
            <div class="p-2">6</div>
            <div class="p-2">7</div>
            <div class="p-2">8</div>
            <div class="p-2">9</div>
            <div class="p-2">10</div>
            <div class="p-2">Total</div>
            <div class="p-2">PS</div>
        </div>

        <div class="grid grid-cols-12 text-center border-b border-gray-300 font-semibold text-sm">
            <!-- PERFORMANCE TASK COLUMNS -->
            <div class="p-2">1</div>
            <div class="p-2">2</div>
            <div class="p-2">3</div>
            <div class="p-2">4</div>
            <div class="p-2">5</div>
            <div class="p-2">6</div>
            <div class="p-2">7</div>
            <div class="p-2">8</div>
            <div class="p-2">9</div>
            <div class="p-2">10</div>
            <div class="p-2">Total</div>
            <div class="p-2">PS</div>
        </div>

        <!-- Learner's Names Section -->
        <div class="grid grid-cols-14 divide-x">
            <div class="col-span-2 bg-gray-200 p-2 text-center">
                <span>Learner's Names</span>
            </div>
            <div class="col-span-2 bg-gray-200 p-2 text-center">
                <span>Highest Possible Score</span>
            </div>
            <div class="col-span-10 text-center">
                <!-- Names and Scores -->
                <div class="grid grid-cols-12 divide-x divide-y">
                    <!-- Male Students -->
                    <div class="col-span-2 bg-gray-300">Male</div>
                    <div class="p-2">Mark Reyes</div>
                    <div class="p-2">Peter Pan</div>
                    <div class="p-2">Jowen Diez</div>
                    <div class="p-2">Evan Tabar</div>
                    <div class="p-2">Ceojay Babioso</div>
                    <div class="col-span-2 bg-gray-300">Female</div>
                    <div class="p-2">Katherine Inson</div>
                    <div class="p-2">Jem Perez</div>
                    <div class="p-2">Christine Par</div>
                    <div class="p-2">Saira Vergara</div>
                    <div class="p-2">Kim Villaruel</div>
                </div>
            </div>
        </div>
        
        <!-- Additional Columns -->
        <div class="grid grid-cols-2 border-t border-gray-300">
            <div class="text-center p-2 font-semibold">Quarterly Assessment (25%)</div>
            <div class="grid grid-cols-2 border-l border-gray-300">
                <div class="text-center p-2 font-semibold">Initial Grade</div>
                <div class="text-center p-2 font-semibold">Quarterly Grade</div>
            </div>
        </div>
    </div>

    <!-- Save Button -->
    <div class="flex justify-end mt-4">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
    </div>
</div>
@endsection
