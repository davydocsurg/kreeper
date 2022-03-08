<?php

namespace App\Http\Controllers;

use App\Events\NewMessage;
use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('id', '!=', Auth::user()->id)->get();

        $unreadIds = Message::select(DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        $users = $users->map(function ($user) use ($unreadIds) {
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

        $messages = Message::where(function ($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function ($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
            ->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
    {
        if ($request->image) {
            $uploadMPhoto = time() . '.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            // dd($uploadMPhoto);
            $validateMessagePhoto = $this->msgPhotoRules($request);

            // Run validation
            if ($validateMessagePhoto->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validateMessagePhoto->errors(),
                    'status' => 400,
                ]);
            }
            Image::make($request->image)->save('messages/photos/' . $uploadMPhoto);

            $request->merge(['image' => $uploadMPhoto]);
            $message = Message::create([
                'from' => auth()->id(),
                'to' => $request->user_id,
                'image' => $request->image,
            ]);
            $message->image = $uploadMPhoto;
        } else {
            // $message = auth()->user()->messages()->create(['message' => $request->message]);
            $message = Message::create([
                'from' => auth()->id(),
                'to' => $request->user_id,
                'text' => $request->text,
            ]);

        }

        // try sending message or catch error(s)
        try {
            broadcast(new NewMessage($message));

            return response()->json([
                'success' => true,
                'message' => 'Message sent',
                'status' => 200,
                'message' => $message,
                // 'access_token' => $token,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => 'Oops! Something went wrong. Try Again!',
            ]);
        }
    }

    /**
     * User image Validation Rules
     * @return object The validator object
     */
    public function msgPhotoRules(Request $request)
    {
        // Make and return validation rules
        return Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
    }

}
