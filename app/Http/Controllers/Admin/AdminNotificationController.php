<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\AdminNotification;

class AdminNotificationController extends Controller
{
    public function index() {
        $user = Auth::guard('admin')->user();
        return view('admin.notification.notification', [
            'user' => $user,
            'notifications' => AdminNotification::where('user_id', $user->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }
    
    public function createNotification(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'type' => 'required|string',
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'url' => 'nullable|url',
            'icon' => 'nullable|string',
            'priority' => 'nullable|in:low,medium,high',
        ]);

        AdminNotification::create([
            'type' => $validatedData['type'],
            'user_id' => $userId,
            'title' => $validatedData['title'],
            'message' => $validatedData['message'],
            'url' => $validatedData['url'] ?? null,
            'icon' => $validatedData['icon'] ?? null,
            'priority' => $validatedData['priority'] ?? 'low',
        ]);

        return response()->json(['message' => 'Notification created successfully.']);
    }

    public function markAsSeen($notificationId)
    {
        $notification = AdminNotification::findOrFail($notificationId);
        $notification->markAsSeen();
        return response()->json(['message' => 'Notification marked as seen.']);
    }

    public function getUnseenNotifications()
    {
        $userId = Auth::id();
        $notifications = AdminNotification::where('user_id', $userId)
            ->unseen()
            ->get();
        return response()->json($notifications);
    }

    public function getHighPriorityNotifications(Request $request)
    {
        $userId = Auth::id();
        $notifications = AdminNotification::where('user_id', $userId)
            ->where('priority', $request->priority)
            ->get();

        return response()->json($notifications);
    }

    // Mark all notifications as read
    public function markAllAsRead() {
        $user = Auth::guard('admin')->user();
        AdminNotification::where('user_id', $user->id)
            ->update(['is_seen' => true]);

        return redirect()->route('admin.notification')
            ->with('success', 'All notifications marked as read.');
    }


}