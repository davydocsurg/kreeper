<?php

namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
use App\Message;
use App\Events\MessageCreated;
use Illuminate\Http\Request;

class MessageController extends ApiController
{
    public function index()
    {
        $messages = Message::with(['user'])->get();

        return response()->json($messages);
    }

    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body
        ]);

        broadcast(new MessageCreated($message))
                ->toOthers();

        return response()->json($message);
    }
}
