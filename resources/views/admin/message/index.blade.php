@extends('admin.layouts.app')

@section('title', 'Chats')
@section('content')
<div class="flex h-screen">
    <!-- Left Column: List of Users -->
    <div class="w-1/3 border-r">
        <div class="p-2 relative bg-white">
            <input oninput="w3.filterHTML('#user_list', '.user', this.value)" type="text" placeholder="Search..." class="form-input rounded w-full pl-8 border border-slate-200">
            <i class="fas fa-search absolute text-sm text-slate-400" style="top: 50%; left: 20px; transform: translateY(-50%)"></i>
        </div>
        <h2 class="text-lg font-bold p-2 pt-0 bg-white border-b text-slate-700">Chats</h2>
        <div class="overflow-y-auto h-full" id="user_list">
            @foreach($allUsers as $user)
            <div class="py-2 px-4 bg-white border-b shadow hover:bg-gray-200 cursor-pointer flex user" onclick="loadChat({{ $user->id }}, '{{ addslashes(get_class($user)) }}')">

                <img src="{{ isset($user->profile) ? asset('storage/' . $user->profile) : 'https://static.vecteezy.com/system/resources/previews/019/896/008/original/male-user-avatar-icon-in-flat-design-style-person-signs-illustration-png.png' }}" alt="" style="height: 40px; width: 40px" />
                <div>
                    <span class="ml-2 block" style="font-size: 14px;">{{ $user->name }}</span>
                    <span class="ml-2 block text-slate-500" style="font-size: 11px;">{{ $user->role }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Center Column: Display Conversations -->
    <div class="w-full bg-white p-4 border-r relative h-full" id="chat-window">
        <h2 class="text-lg font-bold mb-4">Conversations</h2>
        <div id="messages" class="space-y-4 bg-slate-50 overflow-y-auto" style="height: 80%;">
            <!-- Messages will be loaded here dynamically -->
        </div>
        <form action="javascript:void(0)" method="POST" class="w-full absolute bottom-0 left-0 p-2 flex items-center justify-start gap-2">
            @csrf
            <input name="message" id="message-input" class="form-input rounded w-full border border-slate-200" placeholder="Type a message...">
            <button onclick="sendMessage()" class="mt-2 bg-blue-500 text-white rounded p-2 mb-2 px-3"><i class="fas fa-paper-plane"></i></button>
        </form>
    </div>


</div>

<script>
    let selectedUserId;
    let selectedUserType;

    function loadChat(userId, userType) {
        selectedUserId = userId;
        selectedUserType = userType;

        $.getJSON(`/admin/chats/messages/?user_id=${selectedUserId}&user_type=${selectedUserType}`, function(data) {
            console.log(data);
            const messagesDiv = $('#messages');
            messagesDiv.empty();
            if (data.length > 0) {
                $.each(data, function(index, message) {
                    const messageElement = $('<div>').text(message.message);
                    messagesDiv.append(messageElement);
                });
            } else {
                messagesDiv.html('<div class="h-full flex items-center justify-center"><span>No messages yet.</span></div>');
            }
        });
    }

    function sendMessage() {
        const messageInput = $('#message-input');
        const message = messageInput.val();

        $.ajax({
            url: '/admin/chats/send',
            type: 'POST',
            contentType: 'application/json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: JSON.stringify({
                message: message,
                receiver_id: selectedUserId,
                receiver_type: selectedUserType.replace(/\\\\/g, '\\')
            }),
            success: function(data) {
                const messagesDiv = $('#messages');
                messagesDiv.empty();
                const messageElement = $('<div>').text(data.message);
                messagesDiv.append(messageElement);
                messageInput.val('');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    }
</script>

@endsection