<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Http\Requests\SendMessageRequest;
use App\Models\Message;
use App\Models\User;

class ChatController extends Controller
{
    public function index() {
        $user = User::whereNot('id', auth()->user()->id)->firstOrFail();
        return view('chat', compact('user'));
    }

    public function messages() {
        return Message::query()->with('user')->get();
    }

    public function send(SendMessageRequest $request) {
        $message = Message::create($request->validated());

        broadcast(new MessageSent($request->user(), $message));

        return $message;
    }
}
