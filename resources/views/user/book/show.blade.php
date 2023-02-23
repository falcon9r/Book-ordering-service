@extends('layout.master')

@section('title', 'Book show')

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
                        <div class="row">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="product-slider" id="galleryTop">
                                        <div class="swiper-wrapper h-100">
                                            <div class="swiper-slide h-100"> <img class="rounded-1 fit-cover h-100 w-100" src="{{ $book->path }}" alt="" /></div>
                                        </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h5>{{ $book->title }}</h5>
                               <p class="fs--1">{{ $book->annotation }}</p>
                                <h4 class="d-flex align-items-center"><span class="text-warning me-2">{{ $book->display_price }}</span></h4>
                                <p class="fs--1 mb-1"> <span>Age Limit: </span><strong>{{ $book->display_age_limit }}</strong></p>
                                <p class="fs--1">Count of Pages: <strong>{{ $book->count_of_pages }}</strong></p>
                                <p class="fs--1 mb-3">Categories:
                                    @forelse($book->categories as $category)
                                         <a class="ms-2" href="#!">{{ $category->name }}</a>
                                    @empty
                                        No Categories
                                    @endforelse
                                </p>
                                <p class="fs--1 mb-3">Authors:
                                    @forelse($book->authors as $author)
                                        <a class="ms-2" href="#!">{{ $author->name }}</a>
                                    @empty
                                        No Authors
                                    @endforelse
                                </p>
                                <div class="row">
                                    <div class="col-auto px-2 px-md-3"><a class="btn btn-sm btn-primary" href="{{ route('user.books.edit' , $book->id) }}"><span class="d-none d-sm-inline-block">Edit</span></a></div>
                                    <div class="col-auto px-0">
                                    {!! Form::open(['route' => ['user.books.destroy' , $book->id] , 'method' => 'delete']) !!}
                                                {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-outline-danger']) !!}
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
@endsection
