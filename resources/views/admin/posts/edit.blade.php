@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>Edit Post</h4>
        <div class="row mb-2">
            <div class="col-md-3">

                <img src="{{$post->photo ? $post->photo->name : "/images/defaultPost.jpg"}}" class="img-fluid">


            </div>
            <div class="col-md-9 ">
                {!! Form::model($post, ['action' => ['Admin\AdminPostsController@update', $post->id], 'method' => 'PATCH','files'=>true]) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title of comment :', ['class' => 'control-label']) !!}
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
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
                    {!! Form::select('categories',$categories,$post->category->id,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('status', 'Status :', ['class' => 'control-label']) !!}
                    {!!Form::select('status',[0=>'unconfirmed',1=>'confirmed'],null,['class' => 'form-control']) !!}
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
                    {!! Form::submit('update', ['class' => 'btn btn-primary float-md-left']) !!}
                </div>


                {!! Form::close() !!}

              {!! Form::model($post, ['action' => ['Admin\AdminPostsController@destroy', $post->id], 'method' => 'DELETE']) !!}
                <div class="form-group">
                    {!! Form::submit('delete this post!', ['class' => 'btn btn-danger float-md-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
