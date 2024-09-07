@extends('admin.layouts.app')

@section('title', 'Notifications')

@section('content')
<div class="text-slate-100 p-2 bg-blue-400 flex items-center justify-start gap-4">
    <i class="fas fa-bell"></i>
    Notifications
</div>

<div class="p-4">
    @if($notifications->isEmpty())
        <p class="text-gray-500">No notifications available.</p>
    @else
        <div class="space-y-4">
            @foreach ($notifications as $notification)
                <div class="p-4 bg-white rounded shadow-md flex items-start justify-between">
                    <div class="flex items-start gap-3">
                        <!-- Notification Icon -->
                        @if($notification->icon)
                            <i class="fas fa-{{ $notification->icon }} text-xl"></i>
                        @else
                            <i class="fas fa-info-circle text-xl"></i>
                        @endif
                        
                        <!-- Notification Content -->
                        <div>
                            <h3 class="font-semibold text-lg">{{ $notification->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $notification->message }}</p>
                            <p class="text-xs text-gray-400 mt-1">{{ $notification->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Optional URL for the notification -->
                    @if($notification->url)
                        <a href="{{ $notification->url }}" class="text-blue-500 hover:text-blue-700">View</a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
