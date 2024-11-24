@extends('teacher.layouts.app')
@section('title', 'Report Card')
@section('content')
<style>
    body {
        font-size: 0.85rem;
        background-color: white;
    }

    h1,
    h2,
    h3 {
        font-size: 1rem;
    }

    .p-8 {
        padding: 1rem;
    }

    table {
        font-size: 0.75rem;
    }

    th,
    td {
        padding: 0.5rem;
    }

    .space-y-4>* {
        margin-bottom: 0.5rem;
    }

    @media print {
        #report_card {
            width: 100%;
            height: auto;
            position: static;
            background-color: white;
            font-size: 0.75rem;
        }

        .border {
            border-color: black !important;
        }
    }
</style>
<div class=" mx-auto p-8 bg-white overflow-auto">
    <div class="flex my-3">
        <button onclick="window.print()" class="px-5 py-1 bg-blue-800 text-white rounded">Print Report Card</button>
    </div>
    <div style="min-width: 100vw; min-height: 100vh" class="flex items-start justify-start border p-2" id="report_card">
        <!-- first column -->
        <div class="p-5">
            <!-- Attendance Table -->
            <div class="mb-8">
                <h3 class="font-bold mb-4">REPORT OF ATTENDANCE</h3>
                <table class="w-full border-collapse border border-gray-400">
                    <thead>
                        <tr>
                            <th class="border border-gray-400 p-2"></th>
                            <th class="border border-gray-400 p-2">Aug</th>
                            <th class="border border-gray-400 p-2">Sept</th>
                            <th class="border border-gray-400 p-2">Oct</th>
                            <th class="border border-gray-400 p-2">Nov</th>
                            <th class="border border-gray-400 p-2">Dec</th>
                            <th class="border border-gray-400 p-2">Jan</th>
                            <th class="border border-gray-400 p-2">Feb</th>
                            <th class="border border-gray-400 p-2">Mar</th>
                            <th class="border border-gray-400 p-2">Apr</th>
                            <th class="border border-gray-400 p-2">Jun</th>
                            <th class="border border-gray-400 p-2">July</th>
                            <th class="border border-gray-400 p-2">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-gray-400 p-2">No. of school days</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="border border-gray-400 p-2">
                                </td>
                                @endfor
                        </tr>
                        <tr>
                            <td class="border border-gray-400 p-2">No. of days present</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="border border-gray-400 p-2">
                                </td>
                                @endfor
                        </tr>
                        <tr>
                            <td class="border border-gray-400 p-2">No. of days absent</td>
                            @for ($i = 0; $i < 12; $i++)
                                <td class="border border-gray-400 p-2">
                                </td>
                                @endfor
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Parent's/Guardian's Signature -->
            <div class="mb-8">
                <h3 class="font-bold mb-4">PARENT'S/GUARDIAN'S SIGNATURE</h3>
                <div class="space-y-4">
                    <div>
                        1ST QUARTER: <span class="ml-2">________________________________</span>
                    </div>
                    <div>
                        2ND QUARTER: <span class="ml-2">________________________________</span>
                    </div>
                    <div>
                        3RD QUARTER: <span class="ml-2">________________________________</span>
                    </div>
                    <div>
                        4TH QUARTER: <span class="ml-2">________________________________</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- 2nd column -->
        <div class="p-5">
            <!-- Header Section -->
            <div class="flex items-center justify-center gap-6 mb-8">
                <div class="w-20 h-20">
                    <img src="{{ asset('images/ark_logo.png') }}" alt="School Logo" class="w-full h-full object-contain">
                </div>

                <div class="text-center">
                    <h1 class="font-bold">Republic of Philippines</h1>
                    <h2 class="font-bold">DEPARTMENT OF EDUCATION</h2>
                    <p class="text-sm">Region IV-A CALABARZON</p>
                    <p class="text-sm">Schools Division of Lucena City</p>
                    <p class="text-sm">District II</p>
                </div>

                <div class="w-20 h-20">
                    <img src="{{ asset('images/deped_logo.png') }}" alt="DepEd Logo" class="w-full h-full object-contain">
                </div>

            </div>

            <!-- Student Information Form -->
            <div class="mb-8">
                <div class="grid grid-cols-1 gap-4">
                    <div class="border-b border-gray-400">
                        Name: <span class="ml-2">_________________________________</span>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border-b border-gray-400">
                            Age: <span class="ml-2">________________</span>
                        </div>
                        <div class="border-b border-gray-400">
                            Sex: <span class="ml-2">________________</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border-b border-gray-400">
                            Grade: <span class="ml-2">________________</span>
                        </div>
                        <div class="border-b border-gray-400">
                            Section: <span class="ml-2">________________</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="border-b border-gray-400">
                            School Year: <span class="ml-2">________________</span>
                        </div>
                        <div class="border-b border-gray-400">
                            LRN: <span class="ml-2">________________</span>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Parent Letter -->
            <div class="mb-8">
                <p class="mb-2">Dear Parent,</p>
                <p class="mb-4">This report card shows the ability and progress your child has made in the different learning areas as well as his/her core values.</p>
                <p>The school welcomes you should you desire to know more about your child's progress.</p>
            </div>

            <!-- Signatures -->
            <div class="grid grid-cols-2 gap-8 mb-8">
                <div class="text-center">
                    <div class="border-b border-gray-400 mb-1">____________________</div>
                    <div>School Administrator</div>
                </div>
                <div class="text-center">
                    <div class="border-b border-gray-400 mb-1">____________________</div>
                    <div>Teacher</div>
                </div>
            </div>

            <!-- Certificate of Transfer -->
            <div class="mb-8">
                <h3 class="font-bold mb-4 text-center">Certificate of Transfer</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        Admitted to Grade: <span class="ml-2">________________</span>
                    </div>
                    <div>
                        Section: <span class="ml-2">________________</span>
                    </div>
                </div>
                <div class="mb-4">
                    Eligibility for admission to Grade: <span class="ml-2">________________</span>
                </div>
                <p class="mb-4">Approved:</p>
                <div class="grid grid-cols-2 gap-8">
                    <div class="text-center">
                        <div class="border-b border-gray-400 mb-1">____________________</div>
                        <div>School Administrator</div>
                    </div>
                    <div class="text-center">
                        <div class="border-b border-gray-400 mb-1">____________________</div>
                        <div>Teacher</div>
                    </div>
                </div>
            </div>

            <!-- Cancellation Section -->
            <div>
                <h3 class="font-bold mb-4 text-center">Cancellation of Eligibility to Transfer</h3>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div>
                        Admitted in: <span class="ml-2">________________</span>
                    </div>
                    <div>
                        Date: <span class="ml-2">________________</span>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <div class="border-b border-gray-400 mb-1">____________________</div>
                    <div>School Administrator</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection