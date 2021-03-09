@extends('admin.layouts.Master')
@section('content')
    <div class="pl-4 pr-4">
        <h4>List of photoes</h4>
        @if(Session::has('deleted_photo'))
            <div class="alert alert-info">
                <p>{{Session('deleted_photo')}}</p>
            </div>
        @endif
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">photo</th>
                <th scope="col">user</th>
                <th scope="col">Created_at</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>
                        <img src="{{$photo->name ? $photo->name : "/images/defaultImage.png"}}" alt="" class="img-fluid" width="60" height="60">
                    </td>
                    <td>
                        {{$photo->user->name}}
                    </td>
                    <td>
                        {{$photo->created_at}}

                    </td>
                    <td>

                        {!! Form::model($photo, ['action' => ['Admin\AdminPhotosController@destroy',$photo->id], 'method' => 'DELETE']) !!}
                        <div class="form-group">
                            {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="justify-content-center d-flex ">
            {{$photos->links()}}
        </div>
    </div>

@endsection
