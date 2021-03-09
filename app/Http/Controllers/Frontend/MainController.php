<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $posts=Post::with('user','photo','category')->where('status',1)->orderByDesc('created_at')->paginate(4);

        $categories=Category::all();
        $countCategories=Category::count();
        return view('frontend.main.index',compact(['posts','categories','countCategories']));
    }
}
