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

Route::get('/', 'NewsfeedController@show');

//Route::name('threads')->get('/threads', 'NewsfeedController@listThreads');
Route::name('thread')->get('/thread/{threadid}', 'NewsfeedController@getThread');
Route::name('new_thread')->post('/thread/add', 'NewsfeedController@newThread');
