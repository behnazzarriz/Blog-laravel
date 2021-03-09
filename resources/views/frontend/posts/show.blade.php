@extends('frontend.layouts.Master')
@section('head')
    <meta name="description" content="{{$post->meta_description}}">
    <meta name="keywords" content="{{$post->meta_keywords}}">
@endsection
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection


@section('content')
@if (Session::has('add_comment'))
     <p class="alert alert-info">{{Session('add_comment')}}</p>
@endif

    <h1>
        {{$post->title}}</a>
    </h1>
    <p class="lead">
       {{$post->user->name}}
    </p>
    <p><span class="fa fa-clock"></span> Posted on {{date('l jS \of F Y h:i:s A', strtotime($post->created_at))}}</p>
    <hr>
    <img class="img-fluid" src="{{$post->photo->name ?$post->photo->name : "/images/defaultPost.jpg"}}" alt="">
    <hr>
    <p>{{$post->description}}</p>
    <hr>
    <!-- Comments Form -->
    <div class="card my-4">
        <h5 class="card-header">Leave a Comment:</h5>
        <div class="card-body">

                 {!! Form::open(['route' =>['frontend.Comments.Store',$post->id], 'method' => 'post']) !!}
                      <div class="form-group">
                          {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                      </div>
                      <div class="form-group">
                       {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
                      </div>
                {!! Form::close() !!}


        </div>
    </div>
<!-- Single Comment -->


    @include('partials.comments',['comments'=>$post->comments,'post'=>$post])




@endsection
@section('sideBar')
    @include('partials.sideBar',['categories'=>$categories,'countCategories'=>$countCategories])
@endsection
