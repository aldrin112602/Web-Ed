<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Message;
use App\Models\Student\StudentAccount;
use App\Models\Admin\AdminAccount;
use App\Models\Teacher\TeacherAccount;
use App\Models\Guidance\GuidanceAccount;
use Illuminate\Support\Carbon;

class StudentConversationController extends Controller
{
    public function index()
    {
        $user = Auth::guard('student')->user();
        $teachers = TeacherAccount::all();
        $admins = AdminAccount::all();
        $students = StudentAccount::all();
        $guidances = GuidanceAccount::all();

        $allUsers = [...$teachers, ...$admins, ...$students, ...$guidances];
        $allConversations = $this->getAllConversations();
        return view(
            'student.message.index',
            [
                'user' => $user,
                'allUsers' => $allUsers,
                'allConversations' => $allConversations
            ]
        );
    }

    public function getAllConversations()
    {
        $user = Auth::guard('student')->user();
        $conversations = collect();

        $sentMessages = Message::where('sender_id', $user->id)
            ->where('sender_type', get_class($user))
            ->get();

        $receivedMessages = Message::where('receiver_id', $user->id)
            ->where('receiver_type', get_class($user))
            ->get();

        foreach ($sentMessages as $message) {
            $receiverType = $message->receiver_type;
            $receiverId = $message->receiver_id;

            $receiver = null;

            switch ($receiverType) {
                case AdminAccount::class:
                    $receiver = AdminAccount::find($receiverId);
                    break;
                case TeacherAccount::class:
                    $receiver = TeacherAccount::find($receiverId);
                    break;
                case StudentAccount::class:
                    $receiver = StudentAccount::find($receiverId);
                    break;
                case GuidanceAccount::class:
                    $receiver = GuidanceAccount::find($receiverId);
                    break;
            }

            if ($receiver && !$conversations->contains('id', $receiver->id)) {
                $conversations->push($receiver);
            }
        }

        foreach ($receivedMessages as $message) {
            $senderType = $message->sender_type;
            $senderId = $message->sender_id;

            $sender = null;

            switch ($senderType) {
                case AdminAccount::class:
                    $sender = AdminAccount::find($senderId);
                    break;
                case TeacherAccount::class:
                    $sender = TeacherAccount::find($senderId);
                    break;
                case StudentAccount::class:
                    $sender = StudentAccount::find($senderId);
                    break;
                case GuidanceAccount::class:
                    $sender = GuidanceAccount::find($senderId);
                    break;
            }

            if ($sender && !$conversations->contains('id', $sender->id)) {
                $conversations->push($sender);
            }
        }

        return $conversations;
    }

    public function loadMessages(Request $request)
    {
        $userId = $request->get('user_id');
        $userType = $request->get('user_type');
        $user = Auth::guard('student')->user();

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
            // get user account of the receiver
            $receiverModel = $message->receiver_type;
            $senderModel = $message->sender_type;
            $message->receiver_account = $receiverModel::find($message->receiver_id);
            $message->sender_account = $senderModel::find($message->sender_id);
        });

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        $user = Auth::guard('student')->user();
        
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
