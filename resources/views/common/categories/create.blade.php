@extends('layout.master')

@section('title', "Book create")

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Add new Category</h5>
        </div>
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <div class="tab-content">

                    {!! Form::open(['route' => 'common.categories.store', 'enctype' => 'multipart/form-data']) !!}

                    @include('common.errors')

                    <div class="mb-3">
                        {!! Form::label('name', 'Category name', ['class' => 'label-text']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required' ,'placeholder' => '']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::label('description', 'description', ['class' => 'label-text']) !!}
                        {!! Form::textarea('description', null, ['class' => 'form-control','required' ,'placeholder' => '']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
