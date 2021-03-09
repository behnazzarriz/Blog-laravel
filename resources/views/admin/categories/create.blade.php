@extends('admin.layouts.Master')

@section('content')
    <div class="pl-4 pr-4">

        <div class="col-md-6 offset-md-3">
            <h4>Create new Category :</h4>
            @include('partials.form-errors')
            {!! Form::open(['method' => 'Post', 'action' => 'Admin\AdminCategoriesController@store']) !!}
            <div class="form-group">
                {!! Form::label('title', 'Title of Category :', ['class' => 'control-label']) !!}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
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
                {!! Form::submit('save new category', ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
