<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index(Request $request)
    {
        return 'hi';
        // return view('conversations.index', [
        //     'conversations' => Conversation::latest()->paginate(8)
        // ]);
    }

}
