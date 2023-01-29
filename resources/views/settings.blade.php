@extends('layout.master')

@section('title', 'Settings')

@section('content')
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <div class="content">
                <div class="card mb-3">
                    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url({{ asset("assets/img/icons/spot-illustrations/corner-4.png") }});">
                    </div>
                    <!--/.bg-holder-->

                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-lg-8">
                                <h3>Settings</h3>
                            </div>
                            @include('common.success')
                            @include('common.errors')
                        </div>
                        <div class="row">
                            {{ Form::open(['route' => 'settings.photo' , 'files' => 'true']) }}
                                <div class="mb-3">
                                    {!! Form::label("avatar", null, ['class' => 'control-label']) !!}
                                    {!! Form::file('avatar', ['class' => 'form-control']); !!}
                                </div>
                                <div class="mb-3">
                                    {!!  Form::submit('Upload photo' , ['class' => 'btn btn-primary']); !!}
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row flex-between-end">
                            <div class="col-auto align-self-center">
                                <h5 class="mb-0" data-anchor="data-anchor">Personal Data</h5>
                            </div>
                            <div class="col-auto ms-auto">
                            </div>
                        </div>
                    </div>
                    <div class="card-body bg-light">
                        {!!  Form::open(['route' => 'settings.update', 'method' => 'put']) !!}
                            <div class="mb-3">
                                {{ Form::label('name', null, ['class' => 'control-label']) }}
                                {{ Form::text('name', $user->name, ['class' => 'form-control', 'required']) }}
                            </div>
                            <div class="mb-3">
                                {{ Form::label('address', null, ['class' => 'control-label']) }}
                                {{ Form::text('address', $user->address, ['class' => 'form-control', 'required']) }}
                            </div>
                            {!!  Form::submit('Update' , ['class' => 'btn btn-primary']); !!}
                        {!!  Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
