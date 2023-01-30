@extends('layout.master')

@section('title', "Book create")

@section('before_css')
    <link rel="stylesheet" href="{{ asset('vendors/choices/choices.min.css') }}">
@endsection

@section('script')
    <script src="{{  asset('vendors/choices/choices.min.js') }}"></script>
@endsection

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Add new Author</h5>
        </div>
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <div class="tab-content">

                    {!! Form::open(['route' => 'common.authors.store', 'enctype' => 'multipart/form-data']) !!}

                    @include('common.errors')

                    <div class="mb-3">
                        {!! Form::label('name', 'Author name', ['class' => 'label-text']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control','required' ,'placeholder' => 'Example: Napoleon Hill']) !!}
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
