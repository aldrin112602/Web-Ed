<?php
namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function getConversations(Request $request)
    {
        $user = Auth::guard($request->guard)->user();
        $userType = get_class($user);
        $userId = $user->id;

        $conversations = Conversation::where(function($query) use ($userType, $userId) {
            $query->where('user_one_type', $userType)
                  ->where('user_one_id', $userId);
        })->orWhere(function($query) use ($userType, $userId) {
            $query->where('user_two_type', $userType)
                  ->where('user_two_id', $userId);
        })->with(['userOne', 'userTwo', 'messages'])
          ->get();

        return response()->json($conversations);
    }

    public function sendMessage(Request $request, $conversationId)
    {
        $user = Auth::guard($request->guard)->user();

        $message = Message::create([
            'conversation_id' => $conversationId,
            'sender_type' => get_class($user),
            'sender_id' => $user->id,
            'message' => $request->message,
        ]);

        broadcast(new \App\Events\MessageSent($message))->toOthers();

        return response()->json($message);
    }

    public function startConversation(Request $request)
    {
        $user = Auth::guard($request->guard)->user();

        $conversation = Conversation::create([
            'user_one_type' => get_class($user),
            'user_one_id' => $user->id,
            'user_two_type' => $request->user_type,
            'user_two_id' => $request->user_id,
        ]);

        return response()->json($conversation);
    }
}
