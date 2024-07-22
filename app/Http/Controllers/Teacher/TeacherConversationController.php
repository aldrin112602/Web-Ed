<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Student\StudentAccount;
use App\Models\Admin\AdminAccount;
use App\Models\Teacher\TeacherAccount;
use App\Models\Guidance\GuidanceAccount;
use Illuminate\Support\Carbon;

class TeacherConversationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('teacher')->user();
        $teachers = TeacherAccount::all();
        $admins = AdminAccount::all();
        $students = StudentAccount::all();
        $guidances = GuidanceAccount::all();

        $allUsers = [...$teachers, ...$admins, ...$students, ...$guidances];
        return view(
            'teacher.message.index',
            [
                'user' => $user,
                'allUsers' => $allUsers
            ]
        );
    }

    public function loadMessages(Request $request)
    {
        $userId = $request->get('user_id');
        $userType = $request->get('user_type');
        $user = Auth::guard('admin')->user();

        $messages = Message::where(function ($query) use ($userId, $userType, $user) {
            $query->where('sender_id', $user->id)
                ->where('sender_type', get_class($user))
                ->where('receiver_id', $userId)
                ->where('receiver_type', $userType);
        })->orWhere(function ($query) use ($userId, $userType, $user) {
            $query->where('sender_id', $userId)
                ->where('sender_type', $userType)
                ->where('receiver_id', $user->id)
                ->where('receiver_type', get_class($user));
        })->get();

        // Add human-readable time format
        $messages->each(function ($message) {
            $message->time_ago = Carbon::parse($message->created_at)->diffForHumans();
        });

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::guard('admin')->user();
        
        $message = new Message();
        $message->sender_id = $user->id;
        $message->id_number = $user->id_number;
        $message->sender_type = get_class($user);
        $message->receiver_id = $request->get('receiver_id');
        $message->receiver_type = str_replace('\\\\', '\\', $request->get('receiver_type'));
        $message->message = $request->get('message');
        $message->save();

        return response()->json([
            'message' => $message,
            'time_ago' => Carbon::parse($message->created_at)->diffForHumans()
        ]);
    }
}
