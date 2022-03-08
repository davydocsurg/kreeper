<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        try {
            $contacts = User::where('id', '!=', Auth::user()->id)->get();
            return $contacts;

            return response()->json([
                'success' => true,
                'contacts' => $contacts,
                'message' => 'contacts retrieved Successfully',
                'status' => 200,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json(['success' => false, 'status' => 500, 'message' => 'Oops! Something went wrong. Try Again!']);
        }
        // return response()->json(User::where('id', '!=', Auth::user()->id)->get());
    }

    public function authUser()
    {
        // return response()->json(User::where('id', '=', Auth::user()->id)->get());
        try {
            $authUser = Auth::user();
            return $authUser;

            return response()->json([
                'success' => true,
                'authUser' => $authUser,
                'message' => 'authUser retrieved Successfully',
                'status' => 200,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json(['success' => false, 'status' => 500, 'message' => 'Oops! Something went wrong. Try Again!']);
        }
    }

    // public function addAvatar(Request $request)
    // {
    //     // $this->validate($request, [
    //     //     'profile_pic' => 'required'
    //     //  ]);
    //     // $avatar = new User;
    //     // $avatar = $request->get('profile_pic');
    //     $avatar->user_id = Auth::user()->id;
    //         if($request->hasfile('profile_pic')){
    //             $file = $request->file('profile_pic');
    //             $file->move(public_path(). 'public/avatars', $file->getClientOriginalName());
    //             $url = URL::to("/").'public/avatars'. $file->
    //             getClientOriginalName();
    //         }
    //         else {
    //         return $this->response->json([
    //             'success' => false,
    //             'error' => 'no file found.',
    //         ]);
    //     }
    //     $avatar->profile_pic = $url;
    //     $avatar->save();
    //     return $this->response->json($avatar);
    // }

    public function getAvatar()
    {

    }

    public function updateProfile(Request $request)
    {
        $validateUserCredentials = $this->userDetailsRules($request);

        // Run validation
        if ($validateUserCredentials->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validateUserCredentials->errors(),
                'status' => 400,
            ]);
        }

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->nickname = $request->nickname;
        $user->description = $request->description;

        try {
            $user->save();

            return response()->json([
                'success' => true,
                'user' => $user,
                'message' => ' profile updated Successfully',
                'status' => 200,
            ]);
        } catch (\Throwable$th) {
            Log::error($th);
            return response()->json(['success' => false, 'status' => 500, 'message' => 'Oops! Something went wrong. Try Again!']);}
    }

    /**
     * User image Validation Rules
     * @return object The validator object
     */
    public function userDetailsRules(Request $request, User $user)
    {
        // Make and return validation rules
        return Validator::make($request->all(), [
            'name' => 'required|max:250',
            'email' => 'required|email|max:100' . $user->email,
            'nickname' => 'required|max:20',
            'description' => 'required|max:250',
        ]);
    }

    public function getMessage($user_id)
    {
        return $user_id;
    }
}
