@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>List of users</h4>
        @if(Session::has('delete_user'))
            <div class="alert alert-danger">
                <p>{{Session('delete_user')}}</p>
            </div>
        @endif
        @if(Session::has('add_user'))
            <div class="alert alert-info">
                <p>{{Session('add_user')}}</p>
            </div>
        @endif

    <table class="table table-striped ">
        <thead>
        <tr>

            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Created_at</th>
            <th scope="col">Roles</th>
            <th scope="col">Status</th>
            <th>Update</th>

        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)

            <tr>

                <td>

                        <img src="{{$user->photo ? $user->photo->name : "/images/defaultImage.png"}}" alt="" class="img-fluid" width="100" height="100">

                </td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <ul class="p-0 m-0">
                        @foreach($user->roles  as $role)
                            <li>
                                {{$role->name}}
                            </li>
                            @endforeach


                    </ul>
                </td>
                <td>
                    @if ($user->status==0)
                        <span class="badge badge-danger p-2">Unconfirmed</span>
                    @else
                       <span class="badge badge-success p-2"> Confirm</span>
                    @endif
                </td>
                <td><a href="{{route('users.edit',$user->id)}}" class="btn btn-primary" >edit</a></td>

            </tr>
        @endforeach
        </tbody>
    </table>
        <div class="d-flex justify-content-center">{{$users->links()}}</div>
    </div>
@endsection
