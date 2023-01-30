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
                        <div class="row">
                            <div class="col-12">
                                <div class="overflow-hidden mt-4">
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item"><a class="nav-link active ps-0" id="description-tab" data-bs-toggle="tab" href="#tab-description" role="tab" aria-controls="tab-description" aria-selected="true">Description</a></li>
                                        <li class="nav-item"><a class="nav-link px-2 px-md-3" id="specifications-tab" data-bs-toggle="tab" href="#tab-specifications" role="tab" aria-controls="tab-specifications" aria-selected="false">Specifications</a></li>
                                        <li class="nav-item"><a class="nav-link px-2 px-md-3" id="reviews-tab" data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">Reviews</a></li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="description-tab">
                                            <div class="mt-3">
                                                <p>Over the years, Apple has built a reputation for releasing its products with a lot of fanfare – but that didn’t exactly happen for the MacBook Pro 2018. Rather, Apple’s latest pro laptop experienced a subdued launch, in spite of it offering a notable spec upgrade over the 2017 model – along with an improved keyboard. And, as with previous generations the 15-inch MacBook Pro arrives alongside a 13-inch model.</p>
                                                <p>Apple still loves the MacBook Pro though, despite the quiet release. This is because, while the iPhone XS and iPad, along with the 12-inch MacBook, are aimed at everyday consumers, the MacBook Pro has always aimed at the creative and professional audience. This new MacBook Pro brings a level of performance (and price) unlike its more consumer-oriented devices. </p>
                                                <p>Still, Apple wants mainstream users to buy the MacBook Pro, too. So, if you’re just looking for the most powerful MacBook on the market, you’ll love this new MacBook Pro. Just keep in mind that, while the keyboard has been updated, there are still some issues with it.</p>
                                                <p>There’s enough of a difference between the two sizes when it comes to performance to warrant two separate reviews, and here we’ll be looking at how the flagship 15-inch MacBook Pro performs in 2019.</p>
                                                <p>It's build quality and design is batter than elit. Numquam excepturi a debitis, sint voluptates, nam odit vel delectus id repellendus vero reprehenderit quidem totam praesentium vitae nesciunt deserunt. Sint, veniam?</p>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab-specifications" role="tabpanel" aria-labelledby="specifications-tab">
                                            <table class="table fs--1 mt-3">
                                                <tbody>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Processor</td>
                                                    <td>2.3GHz quad-core Intel Core i5,</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Memory</td>
                                                    <td>8GB of 2133MHz LPDDR3 onboard memory</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Brand Name</td>
                                                    <td>Apple</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Model</td>
                                                    <td>Mac Book Pro</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Display</td>
                                                    <td>13.3-inch (diagonal) LED-backlit display with IPS technology</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Storage</td>
                                                    <td>512GB SSD</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Graphics</td>
                                                    <td>Intel Iris Plus Graphics 655</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Weight</td>
                                                    <td>7.15 pounds</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-100" style="width: 30%;">Finish</td>
                                                    <td>Silver, Space Gray</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                            <div class="row mt-3">
                                                <div class="col-lg-6 mb-4 mb-lg-0">
                                                    <div class="mb-1"><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="ms-3 text-dark fw-semi-bold">Awesome support, great code 😍</span>
                                                    </div>
                                                    <p class="fs--1 mb-2 text-600">By Drik Smith • October 14, 2019</p>
                                                    <p class="mb-0">You shouldn't need to read a review to see how nice and polished this theme is. So I'll tell you something you won't find in the demo. After the download I had a technical question, emailed the team and got a response right from the team CEO with helpful advice.</p>
                                                    <hr class="my-4" />
                                                    <div class="mb-1"><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star text-warning fs--1"></span><span class="fa fa-star-half-alt text-warning star-icon fs--1"></span><span class="ms-3 text-dark fw-semi-bold">Outstanding Design, Awesome Support</span>
                                                    </div>
                                                    <p class="fs--1 mb-2 text-600">By Liane • December 14, 2019</p>
                                                    <p class="mb-0">This really is an amazing template - from the style to the font - clean layout. SO worth the money! The demo pages show off what Bootstrap 4 can impressively do. Great template!! Support response is FAST and the team is amazing - communication is important.</p>
                                                </div>
                                                <div class="col-lg-6 ps-lg-5">
                                                    <form>
                                                        <h5 class="mb-3">Write your Review</h5>
                                                        <div class="mb-3">
                                                            <label class="form-label">Ratting: </label>
                                                            <div class="d-block" data-rater='{"starSize":32,"step":0.5}'></div>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formGroupNameInput">Name:</label>
                                                            <input class="form-control" id="formGroupNameInput" type="text" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formGroupEmailInput">Email:</label>
                                                            <input class="form-control" id="formGroupEmailInput" type="email" />
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label" for="formGrouptextareaInput">Review:</label>
                                                            <textarea class="form-control" id="formGrouptextareaInput" rows="3"></textarea>
                                                        </div>
                                                        <button class="btn btn-primary" type="submit">Submit</button>
                                                    </form>
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
