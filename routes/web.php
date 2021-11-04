<?php

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

//user
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('user')->name('user.')->namespace('User')->middleware('verified', 'can:isUser')->group(function () {
    Route::resource('lineChannel', 'LineChannelController', ['except' => ['show']]);
    // Route::resource('pushMessage', 'PushMessageController', ['except' => ['index']]);
    Route::get('/pushMessage/{channelList}', 'PushMessageController@index')->name('pushMessage.index');
    Route::get('/pushMessage/{channelList}/show', 'PushMessageController@show')->name('pushMessage.show');
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('/line/callback', 'LineBotController@callback')->name('line.callback');
});