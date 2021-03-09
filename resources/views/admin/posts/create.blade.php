@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">

        <div class="col-md-10 offset-md-1">
            <h4>Create new post :</h4>
            @include('partials.form-errors')
            {!! Form::open(['method' => 'Post', 'action' => 'Admin\AdminPostsController@store','files'=>true]) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title of comment :', ['class' => 'control-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('slug', 'Slug Name:', ['class' => 'control-label']) !!}
                {!! Form::text('slug',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group position-relative">
                {!! Form::label('first_photo','Choose comments photo :', ['class' => 'control-label']) !!}
                {!! Form::file('first_photo',['class' => '']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('categories', 'choose category :', ['class' => 'control-label']) !!}
                {!! Form::select('categories',$categories,null,['class' => 'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('status', 'Status :', ['class' => 'control-label']) !!}
                {!!Form::select('status',[0=>'unconfirmed',1=>'confirmed'],0,['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('description', 'Description :', ['class' => 'control-label']) !!}
                {!! Form::textarea('description',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_description', 'Meta description :', ['class' => 'control-label']) !!}
                {!! Form::textarea('meta_description',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('meta_keywords', 'Meta Keywords:', ['class' => 'control-label']) !!}
                {!! Form::textarea('meta_keywords',null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('submit', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
