@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>List of Cattegory</h4>
        @if(Session::has('add_category'))
            <div class="alert alert-info">
                <p>{{Session('add_category')}}</p>
            </div>
        @endif
        @if(Session::has('edit_category'))
            <div class="alert alert-info">
                <p>{{Session('edit_category')}}</p>
            </div>
        @endif
        @if(Session::has('deleted_category'))
            <div class="alert alert-info">
                <p>{{Session('deleted_category')}}</p>
            </div>
        @endif
        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Created_at</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        {{$category->title}}
                    </td>
                    <td>
                        {{$category->created_at}}

                    </td>
                    <td>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary">Update</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">{{$categories->links()}}</div>
    </div>
@endsection
