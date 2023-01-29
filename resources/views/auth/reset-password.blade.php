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
                    <div class="bg-holder" style="background-image:url({{ asset('assets/img/generic/15.jpg') }});">
                    </div>
                    <!--/.bg-holder-->

                </div>
                <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
                    <div class="row justify-content-center g-0">
                        <div class="col-lg-9 col-xl-8 col-xxl-6">
                            <div class="card">
                                <div class="card-header bg-circle-shape bg-shape text-center p-2"><a class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../../../index.html">falcon</a></div>
                                <div class="card-body p-4">
                                    <h3 class="text-center">Reset password</h3>
                                    <form class="mt-3" action="{{ route('password.update') }}" method="post">
                                         @csrf
                                        @include('common.errors')
                                        @include('common.success')
                                        <div class="mb-3">
                                            <input hidden type="email" name="email" value="{{ $email }}"/>
                                            <input hidden type="text" name="token"  value="{{ $token }}"/>
                                            <label class="form-label" for="split-reset-password">New Password</label>
                                            <input class="form-control" type="password" name="password" id="split-reset-password" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="split-reset-confirm-password">Confirm Password</label>
                                            <input class="form-control" type="password" name="password_confirmation" id="split-reset-confirm-password" />
                                        </div>
                                        <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Set password</button>
                                    </form>
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
