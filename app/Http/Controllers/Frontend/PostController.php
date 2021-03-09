<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;



class PostController extends Controller
{
    public function show($slug)
    {
        $post=Post::with(['category','user','photo','comments'=>function($q){
            $q->where('status',1)->where('parent_id',null)->orderByDesc('id');

        },
             'comments.replies'=>function($query){
                $query->where('status',1);

         }
        ])->where('slug',$slug)->first();

        $categories=Category::all();
        $countCategories=Category::count();

        return view('frontend.posts.show',compact(['post','categories','countCategories']));
    }

    public function searchTitle(Request $request)
    {


      $query=$request->input('title');
        $posts=Post::with('user','category','photo')
            ->where('title','like','%'.$query.'%')
            ->where('status',1)
            ->orderByDesc('created_at')
            ->paginate(4);

        $categories=Category::all();
        $countCategories=Category::count();

        return view('frontend.posts.search',compact(['posts','categories','countCategories','query']));

    }
}
