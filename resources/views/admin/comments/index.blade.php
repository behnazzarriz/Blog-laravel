@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>List of comments</h4>
        @if(Session::has('edit_comments'))
            <div class="alert alert-info">
                <p>{{Session('edit_comments')}}</p>
            </div>
        @endif
        @if(Session::has('deleted_comments'))
            <div class="alert alert-danger">
                <p>{{Session('deleted_comments')}}</p>
            </div>
        @endif


        @if(Session::has('approved_comment'))
            <div class="alert alert-success">
                <p>{{Session('approved_comment')}}</p>
            </div>
        @endif
        @if(Session::has('unapproved_comment'))
            <div class="alert alert-danger">
                <p>{{Session('unapproved_comment')}}</p>
            </div>
        @endif
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">description</th>
                <th scope="col">related post</th>
                <th scope="col">Created_at</th>
                <th scope="col">status</th>
                <th scope="col">operation</th>


                <th scope="col">Edit</th>

            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>
                        {{$comment->id}}
                    </td>
                    <td>
                        {{$comment->description}}
                    </td>
                    <td>
                        {{$comment->post->title}}
                    </td>
                    <td>
                        {{$comment->created_at}}

                    </td>
                    <td>
                        @if($comment->status==1)
                            <span class="badge badge-success p-2">this post confirmed</span>
                        @elseif($comment->status==0)
                            <span class="badge badge-danger  p-2">this post unconfirmed</span>
                        @endif

                    </td>
                    <td>
                        @if($comment->status==0)
                            {!!Form::open(['method' => 'POST', 'route' => ['comments.actions',$comment->id]])!!}

                                    {!! Form::hidden('actionName', 'approved') !!}
                                    {!! Form::submit('confirmed', ['class' => 'btn btn-primary']) !!}

                            {!! Form::close() !!}
                        @elseif ($comment->status==1)
                            {!!Form::open(['method' => 'POST', 'route' => ['comments.actions',$comment->id]])!!}

                                {!! Form::hidden('actionName','unapproved') !!}
                                {!! Form::submit('unconfirmed', ['class' => 'btn btn-danger']) !!}

                            {!! Form::close() !!}

                        @endif

                    </td>
                    <td>
                        <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{$comments->links()}}</div>
    </div>
@endsection
