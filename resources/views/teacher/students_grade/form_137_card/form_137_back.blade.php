@extends('teacher.layouts.app')
@section('title', 'Form 137')
@section('content')
<div class=" mx-auto p-4 bg-white overflow-auto">
    <div class="flex my-3 gap-3">
        <button onclick="window.print()" class="px-5 py-1 bg-blue-800 text-white rounded">Print Report Card</button>
        | 
        <a href="{{ route('teacher.form_137_front', $student->id) }}?id={{request()->query('id')}}" class="px-5 py-1 bg-green-800 text-white rounded">Front page</a>
        <a href="{{ route('teacher.form_137_back', $student->id) }}?id={{request()->query('id')}}"  class="px-5 py-1 bg-purple-800 text-white rounded">Back page</a>
    </div>
    <div style="min-width: 100vw; min-height: 100vh" id="form_137">
    </div>
</div>
@endsection