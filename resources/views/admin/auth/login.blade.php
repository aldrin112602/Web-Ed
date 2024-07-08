@extends('admin.layouts.auth')

@section('title', 'Admin Login')
@section('content')
    <form action="{{ route('admin.handleLogin') }}" method="post">
        
    </form>
@endsection