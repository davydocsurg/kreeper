<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/authUser', 'UserController@authUser');
Route::get('/users', 'UserController@index');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/chat', 'HomeController@index2')->name('darkhome');

// update profile
Route::post('/updateProfile', 'UserController@updateProfile');

// Route::get('/users','Api\MessageController@index');

// File Upload
Route::post('userFileUpoad', 'UploadController@uploadUserPhoto');
Route::post('msgFileUpload', 'UploadController@uploadMessagePhoto');

// messages
Route::get('/conversation/{id}', 'MessageController@getMessage');
Route::post('/conversation/send', 'MessageController@sendMessage');
