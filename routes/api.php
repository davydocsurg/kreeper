<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'namespace' => 'Api',
    'middleware' => ['auth:api'],
], function () {
    // get users
	// Route::get('/users','UserController@index');
    Route::get('/users','UserController@show');
    // File Upload
    Route::post('file/upload', 'UploadController@fileUpload');
    Route::get('details', 'UploadController@userDetails');
    // send messages
    Route::get('/message', 'MessageController@index');
    Route::post('/message', 'MessageController@store');
    // Edit Avatar
    Route::post('crop/avatar', 'UserController@cropAvatar');
});
