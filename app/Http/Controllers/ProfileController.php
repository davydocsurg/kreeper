<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;
use Auth;

class ProfileController extends Controller
{
    public function addAvatar(Request $request)
    {
        $this->validate($request, [
            'profile_pic' => 'required'
         ]);
        $avatar = new Profile;
        $avatar->user_id = Auth::user()->id;
        if($request->hasfile('profile_pic')){
            $file = $request->file('profile_pic');
            $file->move(public_path(). 'public/avatars', $file->getClientOriginalName());
            $url = URL::to("/").'public/avatars'. $file->
            getClientOriginalName();
           }
        $avatar->profile_pic = $url;
        $avatar->save();
        return $this->response->json($avatar);
    }
}
