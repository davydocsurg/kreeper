<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::where('id', '!=', Auth::id())->get();
            // toArray());
        // count how many message are unread from the selected user
        // $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread
        //             from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::user()->id . "
        //             where users.id != " . Auth::id() . "
        //             group by users.id, users.name, users.avatar, users.email");

        // return response()->json(['users' => $users]);
        return response()->json(User::where('id', '!=', Auth::user()->id)->get());
    }

    public function authUser()
    {
        return response()->json(User::where('id', '=', Auth::user()->id)->get());
    }

    public function addAvatar(Request $request)
    {
        // $this->validate($request, [
        //     'profile_pic' => 'required'
        //  ]);
        // $avatar = new User;
        // $avatar = $request->get('profile_pic');
        $avatar->user_id = Auth::user()->id;
            if($request->hasfile('profile_pic')){
                $file = $request->file('profile_pic');
                $file->move(public_path(). 'public/avatars', $file->getClientOriginalName());
                $url = URL::to("/").'public/avatars'. $file->
                getClientOriginalName();
            }
            else {
            return $this->response->json([
                'success' => false,
                'error' => 'no file found.',
            ]);
        }
        $avatar->profile_pic = $url;
        $avatar->save();
        return $this->response->json($avatar);
    }

    public function getAvatar() {

    }

    public function editProfile()
    {
        if (!\Auth::id()) {
            abort(404);
        }

        $user = \Auth::user();

        return $this->response->json($user);
    }

    public function updateProfile(Request $request, $id)
    {
        $input = $request->except(['name', 'email', 'is_admin']);

        $user = User::query()->findOrFail($id);

        $this->authorize('update', $user);

        $user->update($input);

        return $this->response->json($user);
    }

    public function getMessage($user_id) {
        return $user_id;
    }
}
