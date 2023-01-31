@extends('layout.landing.basic')

@section('title' , 'search')


@section('main')
    <!--/gallery -->
    <section class="w3-gallery py-5">
        <div class="container py-md-5">
            <ul class="portfolio-categ filter mb-md-5 mb-4 p-0 justify-content-center">
                <li class="port-filter all active">
                    <a href="#">All</a>
                </li>
            </ul>
            <ul class="portfolio-area clearfix p-0 m-0">
                @foreach($books as $book)
                        <li class="portfolio-item2 content"   data-id="id-{{$book->id}}" data-type="cat-item">
                        <span class="image-block">
                        <a class="image-zoom" target href="{{ route('books.client' , $book->id) }} data-gal="prettyPhoto[gallery]">
                            <div class="content-overlay"></div>
                            <img src="{{ $book->path }}" class="w3layouts agileits"   width="350" height="450" alt="portfolio-img">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">{{ $book->title }}</h3>
                            </div>
                            </a>
                        </span>
                        </li>
                @endforeach

            </ul>
            <!--end portfolio-area -->
        </div>
        <!-- //gallery container -->
    </section>
    <!-- //gallery-->
@endsection
