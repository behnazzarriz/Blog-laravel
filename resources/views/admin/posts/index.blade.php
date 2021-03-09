@extends('admin.layouts.Master')
@section('scripts')
    <script type="text/javascript">

        window.addEventListener('load', function() {
           $(document).ready(function () {
               $(':checkbox:checked').prop('checked',false);
               $('#options').click(function () {
                   if(this.checked){
                      $('.checkBox').each(function () {
                          this.checked=true;
                      })
                   }
                   else{
                       $('.checkBox').each(function () {
                           this.checked=false;
                       })
                   }
               })
           })
        })
    </script>
@endsection
@section('content')

    <div class="pl-4 pr-4">
        <h4>List of Posts</h4>
        @if(Session::has('add_post'))
            <div class="alert alert-info">
                <p>{{Session('add_post')}}</p>
            </div>
        @endif
        @if(Session::has('post_update'))
            <div class="alert alert-success">
                <p>{{Session('post_update')}}</p>
            </div>
        @endif
        @if(Session::has('post_delete'))
            <div class="alert alert-danger">
                <p>{{Session('post_delete')}}</p>
            </div>
        @endif
        @if(Session::has('post_all_delete'))
            <div class="alert alert-danger">
                <p>{{Session('post_all_delete')}}</p>
            </div>
        @endif
        <form action="/admin/deletedAll/posts" class="form-inline" method="post">
            {{csrf_field()}}
            {{method_field('delete')}}

           <div class="form-group mb-2">
               <select name="checkBoxArray" class="form-control" id="">
                   <option value="delete">all posts delete</option>
               </select>
               <input type="submit" class="btn btn-success ml-2" value="submit" name="submit" >
           </div>

        <table class="table table-striped ">
            <thead>
            <tr>
                <th scope="col">
                    <input type="checkbox" id="options">
                </th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">Created_at</th>
                <th scope="col">Status</th>
                <th scope="col">Edit</th>

            </tr>
            </thead>
            <tbody>
             @foreach($posts as $post)
                   <tr>
                       <td>
                           <input type="checkbox" value="{{$post->id}}" name="checkBoxArray[]" class="checkBox">
                       </td>
                       <td>
                            <img src="{{$post->photo ?$post->photo->name : "/images/defaultImage.png"}}" alt="" class="img-fluid" width="100" height="100">
                       </td>
                       <td>
                           {{$post->title}}
                       </td>
                       <td>
                           {{$post->user->name}}
                       </td>
                       <td>
                           {{Str::limit($post->description,60) }}
                       </td>
                       <td>
                           {{$post->category->title}}
                       </td>
                       <td>
                           {{$post->created_at}}

                       </td>
                       <td>
                           @if($post->status==0)
                               <span class="badge badge-danger p-2">Unconfirmed</span>
                           @else
                               <span class="badge badge-success p-2"> Confirm</span>
                           @endif

                       </td>
                       <td>
                           <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Update</a>
                       </td>
                   </tr>
             @endforeach
            </tbody>
        </table>
        </form>
    </div>
    <div class="d-flex justify-content-center">{{$posts->links()}}</div>
@endsection


