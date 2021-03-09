@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">

     <div class="col-md-6 offset-md-3">
         <h4>Create new user :</h4>
         @include('partials.form-errors')
         {!! Form::open(['method' => 'Post', 'action' => 'Admin\AdminUserController@store','files'=>true]) !!}
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
              {!!Form::select('status',[0=>'unconfirmed',1=>'confirmed'],0,['class' => 'form-control']) !!}
         </div>
         <div class="form-group">
             {!! Form::submit('register', ['class' => 'btn btn-success']) !!}
         </div>
         {!! Form::close() !!}
     </div>
        <div class="col-md-6"></div>
    </div>
@endsection
