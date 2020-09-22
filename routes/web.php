<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // broadcast(new NewMessage('fromUser'));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'HomeController@index2')->name('darkhome');

// messages
// Route::get('/message/{id}', 'MessageController@createMessage');
// Route::post('/message/{id}', 'MessageController@storeMessage');

// Route::get('file/upload', 'UploadController@fileUpload');
// Route::post('file/upload', 'UploadController@fileUpload');

// Route::get('get/avatar', 'UserController@getAvatar');
Route::post('add/avatar', 'UserController@addAvatar');

// update profile
Route::post('update/profile', 'UserController@updateProfile');

// all users
Route::get('/users','MessageController@index');
// auth user
Route::get('/auth/user','UserController@authUser');

// messages
Route::get('/conversation/{id}', 'MessageController@getMessage');
Route::post('/conversation/send', 'MessageController@sendMessage');
