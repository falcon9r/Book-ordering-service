@extends('layout.basic')

@section('title', 'Password Reset')

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
                    <div class="bg-holder overlay" style="background-image:url({{ asset('assets/img/generic/15.jpg') }});background-position: 50% 76%;">
                    </div>
                    <!--/.bg-holder-->
                </div>
                <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-9 col-xl-8 col-xxl-6">
                            <div class="card">
                                <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../../../index.html">falcon</a></div>
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <h4 class="mb-0"> Forgot your password?</h4><small>Enter your email and we'll send you a reset link.</small>
                                        {!! Form::open(['route' => 'password.email', 'method' => 'POST']) !!}
                                        <div class="mb-3 mt-4">
                                            {!! Form::label('email' , null , ['class' => 'control-label']) !!}
                                            {!! Form::email('email' , null ,  ['class' => "form-control" , 'required' , "placeholder" => "Email address"]) !!}
                                            <div class="mb-3"></div>
                                            {!! Form::submit('Send reset link' , ['class' => "btn btn-primary d-block w-100 mt-3"]) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    </div>
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
