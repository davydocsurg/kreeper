<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\DB;
use App\User;
use Validator;
use Auth;
use App\Events\NewMessage;

class MessageController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index() {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $users = $users->map(function($user) use ($unreadIds) {
            $userUnread = $unreadIds->where('sender_id', $user->id)->first();

            $user->unread = $userUnread ? $userUnread->messages_count : 0;

            return $user;
        });

        return response()->json($users);

    }

    public function getMessage($id)
    {
    //  $messages = Message::where('from', $id)->orWhere('to', $id)->get();
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {

        // $file = $request->file('image');
        //     $file->move(public_path(). '/posts/', $file->getClientOriginalName());
        //     $url = URL::to("/"). '/posts/'. $file->
        //     getClientOriginalName();

        if(request()->has('file')){
            $filename = request('file')->store('chat');
            // $filename = request('file')->move('chat');
            $message=Message::create([
                'from' => auth()->id(),
                'to' => $request->user_id,
                'image' => $filename,
            ]);
        }else{
            // $message = auth()->user()->messages()->create(['message' => $request->message]);
            $message = Message::create([
                'from' => auth()->id(),
                'to' => $request->user_id,
                'text' => $request->text
            ]);

        }

        broadcast(new NewMessage($message));

        return response()->json($message);
    }
}
