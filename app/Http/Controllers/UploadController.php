<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

// use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function uploadUserPhoto(Request $request, User $user)
    {

        if ($request->profile_pics) {
            $uploadPhoto = time() . '.' . explode('/', explode(':', substr($request->profile_pics, 0, strpos($request->profile_pics, ';')))[1])[1];
            // dd($uploadPhoto);
            $validateUserPhoto = $this->userPhotoRules($request);

            // Run validation
            if ($validateUserPhoto->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validateUserPhoto->errors(),
                    'status' => 400,
                ]);
            }

            // $uploadPhoto = basename($request->profile_pics);

            // $madeImg = Image::make($request->profile_pics);
            // Storage::put('/pubic/tweets/photos' . $uploadPhoto);
            // $madeImg->save($storeImg);
            Image::make($request->profile_pics)->save('users/photos/' . $uploadPhoto);

            $request->merge(['profile_pics' => $uploadPhoto]);
            $user->profile_pics = $uploadPhoto;
        }

        // try user save or catch error(s)
        try {
            $user->save();

            return response()->json([
                'success' => true,
                'message' => 'User updated',
                'status' => 200,
                'user' => $user,
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
    public function userPhotoRules(Request $request)
    {
        // Make and return validation rules
        return Validator::make($request->all(), [
            'profile_pics' => 'required|image|mimes:jpeg,jpg,png,gif',
        ]);
    }

    public function uploadMessagePhoto(Request $request, Message $message)
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

            // $uploadMPhoto = basename($request->image);

            // $madeImg = Image::make($request->image);
            // Storage::put('/pubic/tweets/photos' . $uploadMPhoto);
            // $madeImg->save($storeImg);
            Image::make($request->image)->save('messages/photos/' . $uploadMPhoto);

            $request->merge(['image' => $uploadMPhoto]);
            $message->image = $uploadMPhoto;
        }

        // try message save or catch error(s)
        try {
            $message->save();

            return response()->json([
                'success' => true,
                'message' => 'Message photo uploaded',
                'status' => 200,
                'message_photo' => $message->image,
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
