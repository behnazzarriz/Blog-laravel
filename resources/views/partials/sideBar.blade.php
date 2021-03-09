

    <!-- Blog Search Well -->
    <div class="card bg-light">
        <div class="card-header">
            <h4>Blog Search</h4>
        </div>
        <div class="card-body">
            {!! Form::open(['action' => ['Frontend\PostController@searchTitle'], 'method' => 'GET']) !!}
            <div class="input-group">
                {!! Form::text('title',null, ['class' => 'form-control']) !!}
                    <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="fa fa-search"></span>
                                </button>
                     </span>

            </div>
            {!! Form::close() !!}
        </div>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Blog Categories</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                    @for ($i = 0; $i <= $countCategories/2; $i++)
                            <li><a href="#">{{$categories[$i]->title}}</a>
                            </li>
                    @endfor
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        @for($i = $countCategories/2+1; $i <$countCategories ; $i++)
                            <li><a href="#">{{$categories[$i]->title}}</a>
                            </li>
                        @endfor
                    </ul>
                </div>
            </div>
            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="card bg-light mt-4">
        <div class="card-header">
            <h4>Side Widget Well</h4>
        </div>
        <div class="card-body">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci
                accusamus
                laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
        </div>
    </div>


