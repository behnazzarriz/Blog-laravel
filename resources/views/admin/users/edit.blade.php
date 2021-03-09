@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>Edit this user : {{$user->name}}</h4>
        <div class="row mb-2">
            <div class="col-md-3">

                    <img src="{{$user->photo ? $user->photo->name : "/images/defaultImage.png"}}" class="img-fluid">


            </div>
            <div class="col-md-9 ">
                @include('partials.form-errors')
                {!! Form::model($user, ['action' => ['Admin\AdminUserController@update', $user->id], 'method' => 'PATCH','files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Name und Family :', ['class' => 'control-label']) !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email :', ['class' => 'control-label']) !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group position-relative">
                    {!! Form::label('avatar','Choose your avatar :', ['class' => 'control-label']) !!}
                    {!! Form::file('avatar',['class' => '']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('roles', 'Role :', ['class' => 'control-label']) !!}
                    {!! Form::select('roles',$roles,null,array('multiple'=>'multiple','name'=>'roles[]','class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status :', ['class' => 'control-label']) !!}
                    {!!Form::select('status',[0=>'unconfirmed',1=>'confirmed'],null,['class' => 'form-control']) !!}
                </div>
                <div class="form-group ">
                    {!! Form::submit('update', ['class' => 'btn btn-success float-md-left']) !!}
                </div>


                {!! Form::close() !!}

                 {!! Form::model($user, ['action' => ['Admin\AdminUserController@destroy', $user->id], 'method' => 'DELETE']) !!}
                        <div class="form-group">
                            {!! Form::submit('delete this user!', ['class' => 'btn btn-danger float-md-right']) !!}
                        </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
