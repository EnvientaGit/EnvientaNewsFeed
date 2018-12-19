<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use Illuminate\Support\Facades\DB;

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

    public function listThreads() {
        // todo: update actual project_id
        //$threads = Thread::where('project_id', '=', 1)->orderBy('title');
        $threads = DB::table('projects')->where('project_id', '=', 1)->orderBy('title');
        return view('threadlist', array(
          'threads' => $threads
        ));
        
        //return 'fnc:listThreads';
    }

    public function getThread() {
        return 'fnc:getThread';
    }

    public function newThread(Request $request) {
        $thread = new Thread;
        if($request->has('newThreadName')) {
            
            // todo: need to get the real owner and project_id from platform
            $thread->owner = 1;
            $thread->project_id = 1;

            $thread->title = $request->input('newThreadName');
            $thread->save();
        }
    	return $request->input('newThreadName');
        //return 'fnc:newThread ';
    }
}
