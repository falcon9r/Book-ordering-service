@extends('layout.master')

@section('title', "Book update")

@section('before_css')
    <link rel="stylesheet" href="{{ asset('vendors/choices/choices.min.css') }}">
@endsection

@section('script')
    <script src="{{  asset('vendors/choices/choices.min.js') }}"></script>
@endsection

@section('content')
    <div class="card mb-3" >

        <div class="card-header">
            <h5 class="mb-0">book data update</h5>
        </div>
        <div class="card-body" >
            <div class="row">
                {{ Form::open(['route' => ['user.books.photo-upload' , $book->id] , 'method' => 'patch', 'enctype' => 'multipart/form-data']) }}
                <div class="mb-3">
                    {!! Form::label("book_cover", null, ['class' => 'control-label']) !!}
                    {!! Form::file('book_cover', ['class' => 'form-control' , 'required']); !!}
                </div>
                <div class="mb-3">
                    {!!  Form::submit('Upload photo' , ['class' => 'btn btn-primary']); !!}
                </div>
                {{ Form::close() }}
            </div>
        </div>
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <div class="tab-content">
                    {!! Form::open(['route' => ['user.books.update' , $book->id],'method' => 'put' ]) !!}
                    @include('common.errors')
                    <div class="mb-3">
                        {!! Form::label('title', 'Title', ['class' => 'label-text']) !!}
                        {!! Form::text('title', $book->title, ['class' => 'form-control','required' ,'placeholder' => 'Enter title']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('publication', 'Publication', ['class' => 'label-text']) !!}
                        {!! Form::number('publication', $book->publication , ['class' => 'form-control','required' ,'placeholder' => 'Enter publication`s year: example 2011']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('code', 'Code', ['class' => 'label-text']) !!}
                        {!! Form::text('code', $book->code, ['class' => 'form-control','required' ,'placeholder' => 'Enter book`s code: example 20112231']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('price', 'Price', ['class' => 'label-text']) !!}
                        {!! Form::number('price', $book->price, ['class' => 'form-control', 'required' , 'placeholder' => 'Enter price' , 'step' => '0.001']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('count_of_pages', 'Number of pages', ['class' => 'label-text']) !!}
                        {!! Form::number('count_of_pages', $book->count_of_pages , ['class' => 'form-control', 'required' , 'placeholder' => 'Enter count of pages']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('age_limit', 'Age Limit', ['class' => 'label-text']) !!}
                        {!! Form::number('age_limit', $book->age_limit , ['class' => 'form-control', 'required' , 'placeholder' => 'Enter Age Limit']) !!}
                    </div>


                    {!! Form::label('categories', 'Categories', ['class' => 'label-text']) !!}
                    <select class="form-select js-choice" id="organizerMultiple" multiple="multiple" size="1" name="categories[]" data-options='{"removeItemButton":true,"placeholder":true}'>
                        @foreach($book->categories as $category)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @endforeach
                        @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <div class="mb-3">
                        {!! Form::label('annotation', 'Annotation', ['class' => 'label-text']) !!}
                        {!! Form::textarea('annotation', $book->annotation , ['class' => 'form-control', 'required' , 'placeholder' => 'Enter annotation' ,  'rows' =>"4", 'cols' => "50"]) !!}
                    </div>


                    <div class="mb-3">
                        {!! Form::submit('Add', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
