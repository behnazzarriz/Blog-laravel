<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       $postsCount=Post::count();
       $categoriesCount=Category::count();
       $usersCount=User::count();
       $photosCount=Photo::count();


       $posts=Post::with('category')->orderBy('created_at','desc')->limit(5)->get();
       $users=User::with('roles')->orderBy('created_at','desc')->limit(5)->get();

       return view('admin.dashboard.index',compact(['postsCount','categoriesCount','usersCount','photosCount','posts','users']));

    }
}
