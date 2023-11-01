<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        return view('conversations.index', [
            'conversations' => Conversation::latest()->paginate(8)
        ]);
    }

    public function create(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'user_id_one' => 'required|exists:users,id',
            'user_id_two' => 'required|exists:users,id',
            'last_message' => 'nullable|string',
        ]);

        // Create the conversation
        $conversation = Conversation::create([
            'user_id_one' => $data['user_id_one'],
            'user_id_two' => $data['user_id_two'],
            'last_message' => $data['last_message'] ?? null,
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Conversation created successfully.');
        // Or return a JSON response if using an API
    }
}
