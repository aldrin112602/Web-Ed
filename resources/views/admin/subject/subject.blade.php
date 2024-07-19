@extends('admin.layouts.app')

@section('title', 'Subject List')
@section('content')
<div class="p-5 bg-slate-50">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <div class="bg-white shadow rounded-lg p-4 flex items-center">
                <div class="flex-grow">
                    <p class="text-2xl mt-2 font-bold">0 Present</p>
                    <p class="text-sm text-gray-500">Total Number of Present Students</p>
                </div>
                <div class="text-blue-500 text-3xl">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 flex items-center">
                <div class="flex-grow">
                    <p class="text-2xl mt-2 font-bold">0 Absent</p>
                    <p class="text-sm text-gray-500">Total Number of Absent Students</p>
                </div>
                <div class="text-blue-500 text-3xl">
                    <i class="fas fa-user"></i>
                </div>
            </div>
            <div class="bg-white shadow rounded-lg p-4 flex items-center">
                <div class="flex-grow">
                    <p class="text-2xl mt-2 font-bold">0 Late Arrival</p>
                    <p class="text-sm text-gray-500">Total Number of Late Students</p>
                </div>
                <div class="text-blue-500 text-3xl">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-blue-100 shadow rounded-lg p-4 flex items-center justify-between">
                <div>
                    <p class="text-lg font-bold">HUMSS</p>
                    <p class="text-2xl mt-2">5</p>
                </div>
                <button class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="bg-blue-100 shadow rounded-lg p-4 flex items-center justify-between">
                <div>
                    <p class="text-lg font-bold">ICT</p>
                    <p class="text-2xl mt-2">5</p>
                </div>
                <button class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="bg-blue-100 shadow rounded-lg p-4 flex items-center justify-between">
                <div>
                    <p class="text-lg font-bold">ABM</p>
                    <p class="text-2xl mt-2">5</p>
                </div>
                <button class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="bg-blue-100 shadow rounded-lg p-4 flex items-center justify-between">
                <div>
                    <p class="text-lg font-bold">HE</p>
                    <p class="text-2xl mt-2">5</p>
                </div>
                <button class="bg-blue-500 text-white rounded-full w-8 h-8 flex items-center justify-center">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection