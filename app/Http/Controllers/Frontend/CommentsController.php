<?php

namespace App\Http\Controllers\Frontend;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CommentsController extends Controller
{
    public function store(Request $request,$postId)
    {
        if($request->input('description')){
        $post=Post::findOrFail($postId);

        $comment=new Comment();
        $comment->description=$request->input('description');
        $comment->post_id=$postId;
        $comment->status=0;       //by default should be zero!
        $comment->save();

        Session::flash('add_comment', 'This message is awaiting confirmation...');
        }
        return back();
    }

    public function reply(Request $request)
    {
        if($request->input('description')){
            $parent=$request->input('parent_id');
            $post=$request->input('post_id');

            $comment=new Comment();
            $comment->description=$request->input('description');
            $comment->status=0;       //by default should be zero!
            $comment->parent_id=$parent;
            $comment->post_id=$post;
            $comment->save();

            Session::flash('add_comment', 'This message is awaiting confirmation...');

        }
        return back();
    }
}
