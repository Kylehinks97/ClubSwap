<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\Conversation;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function store(Request $request, $conversationId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $conversation = Conversation::findOrFail($conversationId);

        // Check if the authenticated user is part of the conversation
        if (!in_array(Auth::id(), [$conversation->user_id_one, $conversation->user_id_two])) {
            abort(403, "Unauthorized action.");
        }

        $message = new Message();
        $message->conversation_id = $conversationId;
        $message->user_id = Auth::id();
        $message->content = $request->message;
        $message->save();

        return redirect()->back()->with('success', 'Message sent successfully.');
    }
}
