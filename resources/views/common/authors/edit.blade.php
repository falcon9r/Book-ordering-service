@extends('layout.master')

@section('title', "Author update")

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <h5 class="mb-0">Add update author</h5>
        </div>
        <div class="card-body bg-light">
            <div class="row align-items-center">
                <div class="tab-content">

                    {!! Form::open(['route' => ['common.authors.update' , $author->id ] , 'method' => 'put' , 'enctype' => 'multipart/form-data']) !!}

                    @include('common.errors')

                    <div class="mb-3">
                        {!! Form::label('name', 'Author name', ['class' => 'label-text']) !!}
                        {!! Form::text('name', $author->name, ['class' => 'form-control','required' ,'placeholder' => 'Example: Napoleon Hill']) !!}
                    </div>

                    <div class="mb-3">
                        {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
