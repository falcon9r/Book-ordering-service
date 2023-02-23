@extends('layout.master')

@section('title', 'Profile')

@section('content')
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <div class="content">
                <div class="card mb-3">
                    <div class="card-header position-relative min-vh-25 mb-7">
                        <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url({{ "assets/img/generic/4.jpg" }});">
                        </div>
                        <!--/.bg-holder-->
                        <div class="avatar avatar-5xl avatar-profile">
                            <img class="rounded-circle img-thumbnail shadow-sm"
                                 src="{{ $user->path }}" width="200" alt="" /></div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mb-1">{{ $user->name }}</h4>
                                <p class="text-500">{{ $user->address  }}</p>
                                <a href="{{ route('settings') }}">
                                <button class="btn btn-falcon-primary btn-sm px-3" type="button">
                                    Edit
                                </button>
                                </a>
                                <div class="border-dashed-bottom my-4 d-lg-none"></div>
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
