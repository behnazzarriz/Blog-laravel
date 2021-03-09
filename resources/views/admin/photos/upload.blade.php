@extends('admin.layouts.Master')
@section('styles')
    <link rel="stylesheet" href="{{asset('css/dropzone.css')}}">
@endsection
@section('content')
    <div class="pl-4 pr-4">
        <div class="col-md-10 offset-md-1">
            <h4>Upload File :</h4>
            {!! Form::open(['method' => 'Post', 'action' => 'Admin\AdminPhotosController@store','class'=>'dropzone']) !!}

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/dropzone.js') }}" defer></script>
@endsection
