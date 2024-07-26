@extends('admin.layouts.app')

@section('title', 'History')
@section('content')
<div class="bg-slate-100 p-4">
    <h1 class="">History</h1>
</div>
<div class="bg-white p-6">
    <div class="flex items-center justify-start mt-3 gap-2 mb-3">
        Filter: 
        <select name="filter" id="filter" class="text-sm form-select rounded-lg">
            <option value="" class="hidden" disabled selected> -- Select one --</option>
            @foreach($allUsers as $_user)
            <option value="{{ $_user->id }}">
            {{$_user->role}} - {{ $_user->name }}
            </option>
            @endforeach
        </select>

        <input type="search" placeholder="Search.." class="text-sm rounded-lg form-input">
    </div>

    <table id="tbl_list" class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <!-- <th class="py-2 px-1 text-center border"><input type="checkbox" id="selectAll"></th> -->
                        <th class="py-3 px-2 text-center border">Position</th>
                        <th class="py-3 px-2 text-center border">History</th>
                        <th class="py-3 px-2 text-center border">Date</th>
                        <th class="py-3 px-2 text-center border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                    <tr>
                        <!-- <td class="py-2 text-center border"><input type="checkbox" class="selectRow highlight-checkbox" data-id="{{ $history->id }}"></td> -->
                        <td class="py-2 text-center border">{{ $history->position }}</td>
                        <td class="py-2 text-center border">{{ $history->history }}</td>
                        <td class="py-2 text-center border">{{ $history->created_at }}</td>
                        
                        <td class="py-2 text-center border">
                            <a href="" class="px-2 py-1 bg-blue-500 text-white rounded-md">View</a>
                            
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
</div>
@endsection