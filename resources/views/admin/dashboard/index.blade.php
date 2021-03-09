@extends('admin.layouts.Master')
@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
        </ol>

        <!-- Icon Cards-->
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5">{{$postsCount}} posts!</div>
                    </div>
                        <!-- Area Chart Example-->
                        <div class="w-100 pt-2">
                            <canvas id="myAreaChart" width="100%" height="30"></canvas>
                        </div>

                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-list"></i>
                        </div>
                        <div class="mr-5">{{$categoriesCount}} categories!</div>
                    </div>
                        <div class="w-100 pt-2">
                            <canvas id="myAreaChartTwo" width="100%" height="30"></canvas>
                        </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-shopping-cart"></i>
                        </div>
                        <div class="mr-5">{{$usersCount}} users!</div>
                    </div>
                        <div class="w-100 pt-2">
                            <canvas id="myAreaChartThree" width="100%" height="30"></canvas>
                        </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                    <div class="card-body">
                        <div class="card-body-icon">
                            <i class="fas fa-fw fa-life-ring"></i>
                        </div>
                        <div class="mr-5">{{$photosCount}} photos!</div>
                    </div>
                        <div class="w-100 pt-2">
                            <canvas id="myAreaChartFour" width="100%" height="30"></canvas>
                        </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h6>Latest users</h6>
                <table class="table table-striped ">
                    <thead>
                    <tr>


                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Roles</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)

                        <tr>


                           <td><a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <h6>Latest posts</h6>


                    <table class="table table-striped ">
                        <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Created_at</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <a href="{{route('posts.edit',$post->id)}}">{{$post->title}}</a>
                                </td>

                                <td>
                                    {{$post->category->title}}
                                </td>
                                <td>
                                    {{$post->created_at}}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

            </div>

        </div>




    </div>
@endsection
