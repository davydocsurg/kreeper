<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
// use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function fileUpload(ImageRequest $request)
    {
        $strategy = $request->get('strategy', 'images');

        if (!$request->hasFile('image')) {
            return $this->response->json([
                'success' => false,
                'error' => 'no file found.',
            ]);
        }

        $path = $strategy.'/'.date('Y').'/'.date('m').'/'.date('d');

        $result = $this->manager->store($request->file('image'), $path);

        return $this->response->json($result);
    }
}
