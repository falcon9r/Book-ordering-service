@extends('layout.landing.basic')

@section('title' , 'Landing')


@section('main')
    <!-- banner -->
    <section class="bannerhny w3pvt-banner" id="home">
        <div class="container">
            <div class="banner-info text-center mx-auto">
                <div class="w3pvt-logo align-self">
                    <img src="{{ asset('landing/assets/img/icons8-open-book-90.png') }}" alt="">
                    <h3>A book that is not worth reading twice is not worth reading once</h3>
                    <form action="#" method="post" class="">
                        <input type="search" name="search" placeholder="Search book here with code or title" required>
                        <button type="submit" class="btn"><span class="fa fa-search" aria-hidden="true"></span></button>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- //banner -->
    <!--/gallery -->
    <section class="w3-gallery py-5">
        <div class="container py-md-5">
            <ul class="portfolio-categ filter mb-md-5 mb-4 p-0 justify-content-center">
                <li class="port-filter all active">
                    <a href="#">All</a>
                </li>
                @foreach($categories as $category)
                    <li class="cat-item-{{ $category->id }}">
                        <a href="#" title="{{ $category->name }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
            <ul class="portfolio-area clearfix p-0 m-0">
                @foreach($categories as $category)
                    @foreach($category->books_with_limit as $book)
                        <li class="portfolio-item2 content"   data-id="id-{{$book->id}}" data-type="cat-item-{{ $category->id }}">
                        <span class="image-block">
                        <a class="image-zoom" href="{{ $book->path }}" data-gal="prettyPhoto[gallery]">
                            <div class="content-overlay"></div>
                            <img src="{{ $book->path }}" class="w3layouts agileits"   width="350" height="450" alt="portfolio-img">
                            <div class="content-details fadeIn-bottom">
                                <h3 class="content-title">{{ $book->title }}</h3>
                            </div>
                        </a>
                    </span>
                    </li>
                    @endforeach
                @endforeach

            </ul>
            <!--end portfolio-area -->
        </div>
        <!-- //gallery container -->
    </section>
    <!-- //gallery-->

    <div class="container">
        <div class="card m-2 mb-4 border-0 rounded-1 shadow">
            <div class="card-body text-center">
                <strong class="text-dark">10 Latest Books</strong>
            </div>
        </div>
    </div>


    <div class="projects" id="special">
        <div class="projects-grids">
            <div class="istagram-feeds">
                @foreach($books as $book)
                    <div class="projects-w3l-grid-info">
                        <a href="#"><img src="{{ $book->path }}" class="" width="200" height="200"  alt="" />
                            <div class="content-overlay"></div>
                            <div class="content-details fadeIn-top">
                                <span class="fa fa-book"></span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </div>

    </div>
    <!-- //middle slider -->
@endsection
