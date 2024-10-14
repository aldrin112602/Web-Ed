@extends('teacher.layouts.app')

@section('title', 'Custom Grade')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-wrap justify-between items-center pb-4">
        <div class="w-full lg:w-1/2">
            <h1 class="text-xl font-bold">Ark Technological Institute Education System Inc.</h1>
        </div>
        <div class="flex items-center justify-end lg:w-1/2">
            <p class="text-base font-medium mr-2">School ID:</p>
            <p class="text-base font-light">405210</p>
            <p class="text-base font-medium mx-2">School Year:</p>
            <p class="text-base font-light">2023-2024</p>
        </div>
    </div>
    <div class="flex flex-wrap justify-between items-center pb-4">
        <div class="w-full lg:w-1/2">
            <p class="text-base font-medium">Region:</p>
            <p class="text-base font-light">IVA</p>
        </div>
        <div class="w-full lg:w-1/2">
            <p class="text-base font-medium">Division:</p>
            <p class="text-base font-light">2nd</p>
        </div>
    </div>
    <div class="flex flex-wrap justify-between items-center pb-4">
        <div class="w-full lg:w-1/2">
            <p class="text-base font-medium">Grade & Section:</p>
            <p class="text-base font-light"></p>
        </div>
        <div class="w-full lg:w-1/2">
            <p class="text-base font-medium">Teacher:</p>
            <p class="text-base font-light"></p>
        </div>
    </div>

    <div class="overflow-x-auto rounded border border-gray-200 shadow">
        <table class="w-full min-w-max table-auto">
            <thead>
                <tr class="text-center bg-gray-200 text-xs font-medium uppercase border border-gray-200">
                    <th rowspan="2" class="w-20 py-4">Learner's Names</th>
                    <th colspan="2" rowspan="2" class="py-4">First Quarter</th>
                    <th colspan="6" class="py-4">Quarterly Assessment</th>
                </tr>
                <tr class="text-center bg-gray-200 text-xs font-medium uppercase border border-gray-200">
                    <th class="px-2 py-1">WRITTEN WORK</th>
                    <th class="px-2 py-1">PERFORMANCE TASK</th>
                    <th class="px-2 py-1">Total</th>
                    <th class="px-2 py-1">PS</th>
                    <th class="px-2 py-1">WS</th>
                    <th colspan="4" class="px-2 py-1">...</th>
                </tr>
            </thead>
            <tbody>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Mark Reyes</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Peter Pan</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">John Dies</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Evens Tabi</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Creedlyn Tabios</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Katherine Icaan</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Jan Perez</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Christine Par</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Salina Vergara</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
                <tr class="border border-gray-200 text-xs text-left">
                    <td class="px-4 py-2">Kim Itural</td>
                    <td colspan="2" class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td class="px-2 py-1"></td>
                    <td colspan="4" class="px-2 py-1"></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection