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

class TeacherConversationController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Get the authenticated user
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
        $messages = Message::where(function ($query) use ($userId, $userType) {
            $query->where('sender_id', Auth::id())
                ->where('sender_type', get_class(Auth::user()))
                ->where('receiver_id', $userId)
                ->where('receiver_type', $userType);
        })->orWhere(function ($query) use ($userId, $userType) {
            $query->where('sender_id', $userId)
                ->where('sender_type', $userType)
                ->where('receiver_id', Auth::id())
                ->where('receiver_type', get_class(Auth::user()));
        })->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $message = new Message();
        $user = Auth::user();
        $message->sender_id = Auth::id();
        $message->id_number = $user->id_number;
        $message->sender_type = get_class(Auth::user());
        $message->receiver_id = $request->get('receiver_id');
        $message->receiver_type = str_replace('\\\\', '\\', $request->get('receiver_type'));
        $message->message = $request->get('message');
        $message->save();

        return response()->json($message);
    }
}
