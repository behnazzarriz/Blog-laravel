<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostEditRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('photo','user','category')->paginate(15);
        return view('admin.posts.index',compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('title','id');
        return view('admin.posts.create',compact(['categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCreateRequest $request)
    {

        $post=new Post();
         $photo=new Photo();
       if($file=$request->file('first_photo')){
           $fileName=time().$file->getClientOriginalName();
           $filePath=$file->getClientOriginalName();
           $file->move('images',$fileName);

           $photo->name=$fileName;
           $photo->path=$filePath;
           $photo->user_id=Auth::id();
           $photo->save();
           $post->photo_id=$photo->id;//must be hier!


       }

        $post->user_id=Auth::id();
        $post->title=$request->input('title');
        $post->description=$request->input('description');

         if($request->input('slug')){
             $post->slug=Str::slug($request->input('slug'));
         }
         else{
             $post->slug=Str::slug($request->input('title'));
         }

        $post->meta_description=$request->input('meta_description');
        $post->meta_keywords=$request->input('meta_keywords');
        $post->category_id=$request->input('categories');

        $post->status=$request->input('status');

        $post->save();



        Session::flash('add_post', 'new post is added');
        return redirect('/admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::with('category')->where('id',$id)->first();
        $categories=Category::pluck('title','id');
        return view('admin.posts.edit',compact(['post','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostEditRequest $request, $id)
    {
       $post=Post::findOrFail($id);
       $photo=new Photo();
       if($request->file('first_photo')){
           $file=$request->file('first_photo');
           $fileName=time().$file->getClientOriginalName();
           $filePath=$file->getClientOriginalName();
           $file->move('images',$fileName);
           $photo->name=$fileName;
           $photo->path=$filePath;
           $photo->user_id=Auth::id();
           $photo->save();
           $post->photo_id=$photo->id;//must be hier!
       }

        $post->title=$request->input('title');
        $post->description=$request->input('description');
        if($request->input('slug')){
            $post->slug=Str::slug($request->input('slug'));
        }
        else{
            $post->slug=Str::slug($request->input('title'));
        }

        $post->meta_description=$request->input('meta_description');
        $post->meta_keywords=$request->input('meta_keywords');
        $post->status=$request->input('status');
        $post->category_id=$request->input('categories');
        $post->save();


        Session::flash('post_update','this post is updated!');
        return  redirect('/admin/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $post=Post::findOrFail($id);
      $photo=Photo::findOrFail($post->photo_id);
      unlink(public_path().$post->photo->name);
      $post->delete();
      $photo->delete();

        Session::flash('post_delete','this post is deleted!');
        return  redirect('/admin/posts');

    }

    public function deletedAll(Request $request)
    {
       /*turn $request->all();*/
        if($request->checkBoxArray!="delete"){

            $posts=Post::findOrFail($request->checkBoxArray);
            foreach ($posts as $post){
                $post->delete();
            }
            Session::flash('post_all_delete','posts is deleted!');
            return redirect()->back();
        }
        else{

            return redirect('/admin/posts');
        }



    }
}
