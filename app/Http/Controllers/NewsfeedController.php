<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Illuminate\Support\Facades\DB;

class NewsfeedController extends Controller
{
    public function show() {
        $threads = DB::table('threads')->where('project_id', '=', 1)->orderBy('title')->get();
    	return view('newsfeed', array(
    		'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
            'threads' => $threads
    	));
    }

    public function getThread(Request $request, $threadid) {
        $ret = false;
        if($threadid) {
            $thread = DB::table('threads')->where('id', '=', $threadid)->get();
            $posts = DB::table('posts')->where('thread_id', '=', $threadid)->orderBy('id')->get();
            var_dump($thread, $posts);
            return view('posts', array(
                'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
                'thread' => $thread,
                'posts' => $posts,
            ));
        }
        //$ret = 'fnc:getThread';
        //return $ret;
    }

    public function newThread(Request $request) {
        $thread = new Thread;
        if($request->has('newThreadName')) {
            
            // todo: need to get the real owner and project_id from platform
            $thread->owner = 1;
            $thread->project_id = 1;

            $thread->title = $request->input('newThreadName');
            $thread->save();
            $newThreadId = $thread->id;
            $newThreadTitle = $thread->title;
        }
    	return view('threadlink', array(
            'threadId' => $newThreadId,
            'threadTitle' => $newThreadTitle,
        ));
    }
}
