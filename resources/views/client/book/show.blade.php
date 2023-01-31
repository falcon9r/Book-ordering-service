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
                                @include('common.success')
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

                                    <div class="col-auto px-0">
                                    @if($already_in_basket == false)
                                        {!! Form::open(['route' => ['client.books.into-basket' , $book->id]]) !!}
                                        <div class="col-auto px-2 px-md-3">
                                            {!! Form::submit('Into basket', ['class' => 'btn btn-sm btn-primary']) !!}
                                        </div>
                                        {!! Form::close() !!}
                                    @else

                                    @endif
                                    </div>
                                    <div class="col-auto px-0">
                                        {!! Form::open(['route' => 'client.orders.store' , 'method' => 'post']) !!}
                                            <input type="number" name="book_id" value="{{ $book->id }}" hidden />
                                            {!! Form::submit('Request', ['class' => 'btn btn-sm btn-outline-primary']) !!}
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="overflow-hidden mt-4">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active ps-0" id="description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Recommendations</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="description-tab">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
