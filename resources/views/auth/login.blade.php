@extends('layout.basic')

@section('title', 'Login')

@section('main')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container-fluid">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="row min-vh-100 bg-100">
                <div class="col-6 d-none d-lg-block position-relative">
                    <div class="bg-holder" style="background-image:url({{ asset('assets/img/generic/bookmark.jpg') }});background-position: 50% 20%;">
                    </div>
                    <!--/.bg-holder-->

                </div>
                <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-9 col-xl-8 col-xxl-6">
                            <div class="card">
                                <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="{{ route('home') }}">Falcon</a></div>
                                <div class="card-body p-4">
                                    <div class="row flex-between-center">
                                        <div class="col-auto">
                                            <h3>Login</h3>
                                        </div>
                                        <div class="col-auto fs--1 text-600"><span class="mb-0 fw-semi-bold">New User?</span> <span><a href="{{ route('register') }}">Create account</a></span></div>
                                    </div>

                                    {!! Form::open(['route' => 'login', 'method' => 'POST']) !!}
                                    @include('common.errors')
                                        <div class="mb-3">
                                            {!! Form::label('email' , null , ['class' => 'control-label']) !!}
                                            {!! Form::email('email' , null ,  ['class' => "form-control" , 'required']) !!}
                                        </div>
                                        <div class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                {!! Form::label('password' , null , ['class' => 'control-label']) !!}
                                            </div>
                                            {!! Form::password('password' ,  ['class' => "form-control" , 'required']) !!}
                                        </div>
                                        <div class="row flex-between-center">
                                            <div class="col-auto">
                                                <div class="form-check mb-0">
                                                    {!! Form::checkbox('remember' , true ,  false , ['class' => 'form-check-input']); !!}
                                                    <label class="form-check-label mb-0" for="split-checkbox">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-auto"><a class="fs--1" href="{{ route('password.request') }}">Forgot Password?</a></div>
                                        </div>
                                        <div class="mb-3">
                                            {!! Form::submit('Log in' , ['class' => "btn btn-primary d-block w-100 mt-3"]) !!}
                                        </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
@endsection
