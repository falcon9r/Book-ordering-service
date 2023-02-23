@extends('layout.master')

@section('title', 'My books')

@section('content')
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
                    <div class="card-body">
                        <div class="row flex-between-center">
                            <div class="col-sm-auto mb-2 mb-sm-0">
                                <h6 class="mb-0">My books for Sale</h6>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            @include('common.success')
                            <div class="row">
                                @foreach($books as $book)
                                <div class="mb-4 col-md-6 col-lg-4">
                                    <div class="border rounded-1 h-100 d-flex flex-column justify-content-between pb-3">
                                        <div class="overflow-hidden">
                                            <div class="position-relative rounded-top overflow-hidden"><a class="d-block" href="{{ route('user.books.show' , $book->id) }}">
                                                    <img class="img-fluid rounded-top" src="{{ $book->path }}" alt="" /></a>
                                            </div>
                                            <div class="p-3">
                                                <h5 class="fs-0"><a class="text-dark" href="{{  route('user.books.edit' , $book->id) }}">{{ $book->title }}</a></h5>
                                                <p class="fs--1 mb-3"><a class="text-500" href="#!">Publication : {{ $book->publication }}</a></p>
                                                <p class="fs--1 mb-1">Book Cost: <strong>{{ $book->display_price }}</strong></p>
                                                <p class="fs--1 mb-1">Age Limit: <strong>{{ $book->display_age_limit }}</strong>
                                                <p class="fs--1 mb-1">Count of Pages: <stron>{{ $book->count_of_pages }}</stron>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-between-center px-3">
                                            <a href="{{  route('user.books.edit' , $book->id)  }}">
                                                <button class="btn btn-outline-facebook">Edit</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                </div>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-center">
                            {{ $books->onEachSide(2)->links()}}
                        </div>
                    </div>

            </div>
        </div>
    </main>
@endsection
