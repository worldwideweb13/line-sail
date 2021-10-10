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
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');;

Route::get('/', function () {
    return view('pages.user.home');
});

Route::group(['namespace' => 'Api'], function () {
    Route::post('/line/callback', 'LineBotController@callback')->name('line.callback');
});