@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">
        <h4>Edit Category</h4>
        <div class="row mb-2">
            <div class="col-md-6 offset-md-3">
                @include('partials.form-errors')
                {!! Form::model($category, ['action' => ['Admin\AdminCategoriesController@update', $category->id], 'method' => 'PATCH']) !!}

                <div class="form-group">
                    {!! Form::label('title', 'Title of category :', ['class' => 'control-label']) !!}
                    {!! Form::text('title',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug Name:', ['class' => 'control-label']) !!}
                    {!! Form::text('slug',null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('meta_description', 'Meta description :', ['class' => 'control-label']) !!}
                    {!! Form::textarea('meta_description',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('meta_keywords', 'Meta Keywords:', ['class' => 'control-label']) !!}
                    {!! Form::textarea('meta_keywords',null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('update', ['class' => 'btn btn-primary float-md-left']) !!}
                </div>


                {!! Form::close() !!}

                {!! Form::model($category, ['action' => ['Admin\AdminCategoriesController@destroy', $category->id], 'method' => 'DELETE']) !!}
                <div class="form-group">
                    {!! Form::submit('delete this category!', ['class' => 'btn btn-danger float-md-right']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection
