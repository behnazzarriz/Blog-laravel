<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CommentsController extends Controller
{
    public function index()
    {
        $comments=Comment::with('post')->orderByDesc('created_at')->paginate(30);
        return view('admin.comments.index',compact(['comments']));
    }

    public function actions(Request $request,$id)
    {
        $comment=Comment::findOrFail($id);
        if($request->has('actionName')){

            if($request->input('actionName')=='approved'){

                $comment->status=1;

                Session::flash('approved_comment', 'this comment approved');
            }
            elseif ($request->input('actionName')=='unapproved'){
                $comment->status=0;

                Session::flash('unapproved_comment', 'this comment unapproved');
            }
            $comment->save();
        }


        return redirect('/admin/comments');
    }
    public function edit($id){
        $comment=Comment::findOrFail($id);
        return view('admin.comments.edit',compact(['comment']));
    }
    public function update(Request $request,$id){
       $comment=Comment::findOrFail($id);
       $comment->description=$request->input('description');
        $comment->status=$request->input('status');
        $comment->save();

        Session::flash('edit_comments', 'this comment updated');
        return redirect('/admin/comments');
    }

    public function destroy($id)
    {
        $comment=Comment::findOrFail($id);
        $comment->delete();

        Session::flash('deleted_comments', 'this comment deleted');
        return redirect('/admin/comments');

    }

}
