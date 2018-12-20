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

Route::name('thread')->get('/thread/{threadid}', 'NewsfeedController@getThread');
Route::name('new_thread')->post('/thread/add', 'NewsfeedController@newThread');

Route::name('new_post')->post('/post/add', 'NewsfeedController@newPost');
