@extends('frontend.layouts.Master')
@section('navigation')
    @include('partials.navigation',['categories'=>$categories])
@endsection

@section('content')
    <h1 class="page-header">
       The reault search for {{ $query}} !
    </h1>

    @foreach($posts as $post)
        <h1>
            <a href="{{route('frontend.post.show',$post->slug)}}">{{$post->title}}</a>
        </h1>
        <p class="lead">
            by <a href="#">{{$post->user->name}}</a>
        </p>
        <p><span class="fa fa-clock"></span> Posted on {{date('l jS \of F Y h:i:s A', strtotime($post->created_at))}}</p>
        <hr>
        <img class="img-fluid" src="{{$post->photo->name ?$post->photo->name : "/images/defaultPost.jpg"}}" alt="">
        <hr>
        <p>{{Str::limit($post->description,120) }}</p>
        <a class="btn btn-primary" href="{{route('frontend.post.show',$post->slug)}}">Read More <span class="fa fa-angle-right"></span></a>

        <hr>
    @endforeach

    <div class="justify-content-center d-flex">
        {{ $posts->appends(request()->query())->links()  }}
    </div>
@endsection
@section('sideBar')
    @include('partials.sideBar',['categories'=>$categories,'countCategories'=>$countCategories])
@endsection
