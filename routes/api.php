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

Route::get('/authUser', 'UserController@authUser');
Route::get('/users', 'UserController@index');

Route::group([
    // 'namespace' => 'Api',
    'middleware' => 'auth:api',
], function () {
    // get users

    // update profile
    Route::post('/updateProfile', 'UserController@updateProfile');

    // Route::get('/users','Api\MessageController@index');

    // File Upload
    Route::post('userFileUpoad', 'UploadController@uploadUserPhoto');
    Route::post('msgFileUpload', 'UploadController@uploadMessagePhoto');
    // Route::get('details', 'UploadController@userDetails');

    // send messages
    Route::get('/message/{id}', 'API\MessageController@createMessage');
    Route::post('/message/send', 'API\MessageController@store');

    // Edit Avatar
    // Route::post('add/avatar', 'UserController@addAvatar');
    // Route::get('add/avatar', 'UserController@addAvatar');
});
