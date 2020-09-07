<?php

namespace App\Http\Controllers\Api;

use App\Scopes\StatusScope;
use Illuminate\Support\Str;
// use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
use Image;
use App\User;

class UserController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // return response()->json(User::with()->get(), 200);
        $users = User::withoutGlobalScope(StatusScope::class)
            ->filter($request->all())
            ->orderBy('created_at', 'desc');
            // ->paginate(10);

        return $this->response->collection($users);
    }

    // public function cropAvatar(Request $request)
    // {
    //     $currentImage = $request->get('image');
    //     $data = $request->get('data');

    //     $image = Image::make($currentImage['relative_url']);

    //     $image->crop((int) $data['width'], (int) $data['height'], (int) $data['x'], (int) $data['y']);

    //     $image->save($currentImage['relative_url']);

    //     auth()->user()->update(['avatar' => $currentImage['url']]);

    //     return $this->response->json($currentImage);
    // }

    public function userDetails(UserRequest $request) {
        // if (!\Auth::id()) {
        //     abort(404);
        // }

        // $user = \Auth::user();

        // return $this->response->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $user)
    {
        $user = User::query()->findOrFail($user);
        return response()->json($user, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
