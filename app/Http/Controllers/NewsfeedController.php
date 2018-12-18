<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsfeedController extends Controller
{
    public function show() {
    	return view('newsfeed', array(
    		'avatar_hash' => '7f71469004f56b62e6753b94abc46469'
    	));
    }

    public function showPosts() {
    	return view('posts');
    }

    public function newThread() {
    	return true;
    }
}
