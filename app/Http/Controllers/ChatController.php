<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageSent;

class ChatController extends Controller
{
    public function send(Request $request)
    {
        $message = $request->message;
        $user = auth()->user();

        broadcast(new MessageSent($message, $user))->toOthers();

        return response()->json(['status' => 'sent']);
    }
}
