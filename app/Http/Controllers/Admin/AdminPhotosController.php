<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $photos=Photo::with('user')->paginate(15);

       return view('admin.photos.index',compact(['photos']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo=new Photo();


            $file=$request->file('file');
            $fileName=time().$file->getClientOriginalName();
            $filePath=$file->getClientOriginalName();
            $file->move('images',$fileName);

            $photo->name=$fileName;
            $photo->path=$filePath;
            $photo->user_id=Auth::id();
            $photo->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo=Photo::findOrFail($id);

        unlink(public_path().$photo->name);
        $photo->delete();
        Session::flash('deleted_photo', 'photo is deleted...!');
        return  redirect('admin/photos');


    }

    public function upload()
    {


        return view('admin.photos.upload');
    }
}
