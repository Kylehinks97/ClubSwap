<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index()
    {
        // Get the ID of the currently logged-in user
        $userId = auth()->id();

        // Retrieve conversations where the current user is either user_id_one or user_id_two
        $conversations = Conversation::where('user_id_one', $userId)
            ->orWhere('user_id_two', $userId)
            ->latest()
            ->paginate(8);

        // Pass the conversations to the view
        return view('conversations.index', compact('conversations'));
    }


    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'user_id_two' => 'required|exists:users,id',
            'message' => 'required|string|max:1000', // Assuming a max length for messages
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('You must be logged in to send a message.');
        }

        // Get the currently authenticated user's ID
        $userIdOne = Auth::id();

        // Create the conversation
        $conversation = Conversation::create([
            'user_id_one' => $userIdOne,
            'user_id_two' => $data['user_id_two'],
            'last_message' => $data['message'],
        ]);

        // Redirect back with a success message
        return redirect()->to('/conversations')->with('success', 'Message sent successfully.');
    }

    public function create(Request $request)
    {
        $recipientUserId = $request->query('user_id');
        $recipientUser = User::find($recipientUserId);
        return view('conversations.create', ['recipientUser' => $recipientUser]); // make sure the view exists
    }

}
