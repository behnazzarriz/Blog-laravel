@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>Edit comment</h4>
        <div class="row mb-2">
            <div class="col-md-6  offset-3">
                {!! Form::model($comment, ['action' => ['Admin\CommentsController@update', $comment->id], 'method' => 'PATCH']) !!}

                <div class="form-group">
                    {!! Form::label('description', 'Description of comment :', ['class' => 'control-label']) !!}
                    {!! Form::text('description',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', 'Status :', ['class' => 'control-label']) !!}
                    {!!Form::select('status',[0=>'unconfirmed',1=>'confirmed'],null,['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::submit('update', ['class' => 'btn btn-primary float-md-left']) !!}
                </div>


                {!! Form::close() !!}

                {!! Form::model($comment, ['action' => ['Admin\CommentsController@destroy', $comment->id], 'method' => 'DELETE']) !!}
                <div class="form-group">
                    {!! Form::submit('delete this post!', ['class' => 'btn btn-danger float-md-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
