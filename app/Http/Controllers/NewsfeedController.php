<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Thread;
use App\Post;
use Illuminate\Support\Facades\DB;

class NewsfeedController extends Controller
{
    public function show() {
        // todo: need to get the real project_id from platform
        $thread = DB::table('threads')->where('project_id', '=', 1)->orderBy('id')->first();
        $posts = DB::table('posts')->where('thread_id', '=', $thread->id)->orderBy('id')->get();
        $threads = DB::table('threads')->where('project_id', '=', 1)->orderBy('title')->get();
    	return view('newsfeed', array(
    		'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
            'threads' => $threads,
            'thread' => $thread,
            'posts' => $posts,
    	));
    }

    public function getThread(Request $request, $threadid) {
        if($threadid) {
            $thread = DB::table('threads')->where('id', '=', $threadid)->first();
            $posts = DB::table('posts')->where('thread_id', '=', $threadid)->orderBy('id')->get();
            //var_dump($thread, $posts);
            return view('postscontainer', array(
                'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
                'thread' => $thread,
                'posts' => $posts,
            ));
        } else {
            return false;
        }
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



    public function newPost(Request $request) {
        $post = new Post;
        if($request->has('newPostContent') && $request->has('newPostThread')) {
            
            // todo: need to get the real owner from platform
            $post->owner = 1;

            $post->thread_id = $request->input('newPostThread');
            $post->content = $request->input('newPostContent');
            $post->save();
            $newPostId = $post->id;
            $newPostContent = $post->content;
        }
        return view('post.single_post', array(
            'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
            'id' => $newPostId,
            'content' => $newPostContent,
            'post' => $post,
        ));
    }
}
