@extends('admin.layouts.create')

@section('title', 'Edit Subject')
@section('content')
<div class="text-slate-100 p-2 bg-blue-400">Edit Subject</div>
<div class="min-w-full flex items-center justify-center p-6" style="min-height: 560px">
    <form action="{{ route('admin.update.subject', $subject->id) }}" method="post" class="w-full max-w-3xl bg-white rounded-lg p-8 shadow">
        @csrf
        @method('PUT')
        <div class="w-full">
            <label for="subject" class="block text-gray-700 mt-2 text-sm mb-1">Subject</label>
            <input type="text" id="subject" name="subject" class="form-input w-full rounded border-gray-300 @error('subject') border-red-500 @enderror" value="{{ old('subject') ?? $subject->subject }}">
            @error('subject')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            <label for="teacher" class="block text-gray-700 mt-2 text-sm mb-1">Assign Teacher</label>
            <input type="text" id="teacher" name="teacher" class="form-input w-full rounded border-gray-300 @error('teacher') border-red-500 @enderror" value="{{ old('teacher') ?? $subject->teacher }}">
            @error('teacher')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="w-full">
            <label for="time" class="block text-gray-700 mt-2 text-sm mb-1">Time</label>
            <input type="text" id="time" name="time" class="form-input w-full rounded border-gray-300 @error('time') border-red-500 @enderror" value="{{ old('time') ?? $subject->time }}">
            @error('time')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-6">
            <button type="submit" class="w-full md:w-40 bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Update subject</button>
        </div>
    </form>
</div>
@endsection