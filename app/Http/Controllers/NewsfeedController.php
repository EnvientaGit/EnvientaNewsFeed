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
        $project_id = 1;
        $thread = DB::table('threads')->where('project_id', '=', $project_id)->orderBy('id')->first();
        if(!$thread) {
            $thread = NULL;
            $posts = NULL;
            $threads = NULL;
        } else {
            $posts = DB::table('posts')->where('thread_id', '=', $thread->id)->orderBy('id')->get();
            $threads = DB::table('threads')->where('project_id', '=', $project_id)->orderBy('title')->get();
        }
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
            return view('post.postscontainer', array(
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
            $project_id = 1;
            $thread->owner = 1;
            $thread->project_id = $project_id;

            $thread->title = $request->input('newThreadName');
            $thread->save();
            $newThreadId = $thread->id;
            $newThreadTitle = $thread->title;
        }
    	return view('thread.threadlink', array(
            'threadId' => $newThreadId,
            'threadTitle' => $newThreadTitle,
        ));
    }



    public function newPost(Request $request) {
        $post = new Post;
        if($request->has('newPostContent') && $request->has('newPostThread')) {

            // todo: need to get the real owner from platform
            $post->owner = 1;

            $likes = '[]';
            $replyTo = $request->input('replyTo');
            if(!$replyTo) {
                $replyTo = 0;
            }
            $post->replyto = $replyTo;
            $post->thread_id = $request->input('newPostThread');
            $post->content = $request->input('newPostContent');
            $post->like_user_id = $likes;
            $post->save();
            $newPostId = $post->id;
            $newPostContent = $post->content;

            return view('post.single_post', array(
                'avatar_hash' => '7f71469004f56b62e6753b94abc46469',
                'id' => $newPostId,
                'replyto' => $replyTo,
                'content' => $newPostContent,
                'like_user_id' => $likes,
                'post' => $post,
            ));
        }
    }

    public function likePost(Request $request) {
        $ret = 0;
        if($request->has('postId')) {
            
            // todo: need to get the real owner from platform
            $user_id = mt_rand(1,1000);

            $post = DB::table('posts')->where('id', '=', $request->input('postId'))->first();
            $likes = json_decode($post->like_user_id, true);
            if(is_array($likes)) {
                if(in_array($user_id, $likes)) {
                    $ret = 0;
                } else {
                    array_push($likes, $user_id);
                    $ret = 1;
                }
            } else {
                $likes = array($user_id);
                $ret = 1;
            }
            
            //$post->like_user_id = json_encode($likes);
            //$post->save();
            $post = DB::table('posts')->where('id', '=', $request->input('postId'))->update(array('like_user_id'=>json_encode($likes)));
            
        }
        return $ret;
    }




}
