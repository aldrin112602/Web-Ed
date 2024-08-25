@extends('guidance.layouts.app')

@section('title', 'Attendance History')

@section('content')
<div class="p-4 bg-white">
    <div class="mb-4">
        <!-- <h2 class="text-2xl font-bold text-gray-800">Jenny Rose Perez</h2> -->
    </div>

    <div class="flex justify-between items-center mb-4">
    <h1>STUDENT LIST</h1>
        <!-- <div>
            <button class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg shadow hover:bg-gray-400">Print</button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-600">Excel</button>
        </div> -->
        <div>
            <input type="text" placeholder="Search" class="w-full p-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
    </div>



    
    <hr class="my-3">
        @if ($account_list->count())
        <p class="text-sm text-slate-500 mb-3">
            Showing {{ $account_list->firstItem() }} - {{ $account_list->lastItem() }} of {{ $account_list->total() }} students
        </p>

        <!-- Student List Table -->
        <div class="overflow-x-auto" id="tablePreview">
            
            <table id="tbl_list" class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-2 text-center border">ID No.</th>
                        <th class="py-3 px-2 text-center border">Username</th>
                        <th class="py-3 px-2 text-center border">Name</th>
                        <th class="py-3 px-2 text-center border">Gender</th>
                        <th class="py-3 px-2 text-center border">Grade</th>
                        <th class="py-3 px-2 text-center border">Strand</th>
                        <th class="py-3 px-2 text-center border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($account_list as $list)
                    <tr>
                        <td class="py-2 text-center border">{{ $list->id_number }}</td>
                        <td class="py-2 text-center border">{{ $list->username }}</td>
                        <td class="py-2 text-center border">{{ $list->name }}</td>
                        <td class="py-2 text-center border">{{ $list->gender }}</td>
                        <td class="py-2 text-center border">{{ $list->grade }}</td>
                        <td class="py-2 text-center border">{{ $list->strand }}</td>
                        
                        <td class="py-2 text-center border">
                            <a href="" class="py-1 rounded px-3 bg-blue-900 text-white">
                            <i class="fa-solid fa-clock-rotate-left"></i>
                            Attendance history
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Display pagination links -->
        <div class="w-full mb-4 mt-4">
            {{ $account_list->appends(request()->query())->links() }}
        </div>
        @else
        <p>No records found.</p>
        @endif
    </div>


    

    <!-- Attendance Table -->
    <!-- <div class="overflow-x-auto">
        @if ($attendace_histories->isEmpty())
        <div class="text-center p-10 bg-white">
            <p>
                No history found, nothing to display at the moment.
            </p>
        </div>
        @else
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

                @foreach ($attendace_histories as $history)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        {{ $history->date }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $SubjectModel::where('id', $history->subject_model_id)->first()->day }}
                    </td>
                    <td class="py-3 px-6 text-left flex items-center gap-2">
                        <i class="fa-regular fa-note-sticky"></i>
                        {{ $SubjectModel::where('id', $history->subject_model_id)->first()->subject }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $TeacherAccount::where('id', $history->teacher_id)->first()->name }}
                    </td>
                    <td class="py-3 px-6 text-left">
                        {{ $SubjectModel::where('id', $history->subject_model_id)->first()->time }}
                    </td>
                    <td class="py-3 px-6 text-left">{{ $history->status }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
        @endif
    </div> -->

</div>
@endsection
