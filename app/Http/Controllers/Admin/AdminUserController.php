<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::with('roles')->paginate(15);

        return view('admin.users.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id');

        return view('admin.users.create',compact(['roles']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {

        $user=new User();
        if($file=$request->file('avatar')){
            $name=time().$file->getClientOriginalName();
            $path=$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=new Photo();
            $photo->path=$path;
            $photo->name=$name;
            $photo->user_id=Auth::id();
            $photo->save();

            $user->photo_id=$photo->id;//must be hier!

        }
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password=bcrypt($request->input('password'));
        $user->status=$request->input('status');

        $user->save();
        $user->roles()->attach($request->input('roles'));

        Session::flash('add_user', 'add this user !');


        return redirect('/admin/users');

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
        $user=User::findOrFail($id);
        $roles=Role::pluck('name','id');
        return view('admin.users.edit',compact(['user','roles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
      $user=User::findOrFail($id);
     if($file=$request->file('avatar')){
         $name=time().$file->getClientOriginalName();
         $path=$file->getClientOriginalName();
         $file->move('images',$name);

         $photo=new Photo();
         $photo->name=$name;
         $photo->path=$path;
         $photo->user_id=Auth::id();
         $photo->save();

         $user->photo_id=$photo->id;//must be hier!
       }

     $user->name=$request->input('name');
     $user->email=$request->input('email');

     if(trim($request->input('password')!="")){
         $user->password=bcrypt($request->input('password'));
     }
     $user->status=$request->input('status');
     $user->save();
     $user->roles()->sync($request->input('roles'));

     return redirect('/admin/users');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::findOrFail($id);
        $photo=Photo::findOrFail($user->photo_id);
        unlink(public_path().$user->photo->name);/*remove image of public folder!*/
        $photo->delete();
        $user->delete();

        Session::flash('delete_user', 'this user is deleted !');/*show comment after deleted*/
        return redirect('/admin/users');


    }
}
