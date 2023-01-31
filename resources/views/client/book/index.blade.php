@extends('layout.master')

@section('title', 'Orders')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    @include('common.success')
                    <div class="col-12">
                        <div class="overflow-hidden mt-4">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item"><a class="nav-link active ps-0" id="requested-tab" data-bs-toggle="tab" href="#tab-requested" role="tab" aria-controls="tab-requested" aria-selected="true">Requested</a></li>
                                <li class="nav-item"><a class="nav-link px-2 px-md-3" id="accepted-tab" data-bs-toggle="tab" href="#tab-accepted" role="tab" aria-controls="tab-accepted" aria-selected="false">Accepted</a></li>
                                <li class="nav-item"><a class="nav-link px-2 px-md-3" id="served-tab" data-bs-toggle="tab" href="#tab-served" role="tab" aria-controls="tab-served" aria-selected="false">Served</a></li>
                                <li class="nav-item"><a class="nav-link px-2 px-md-3" id="cancelled-tab" data-bs-toggle="tab" href="#tab-cancelled" role="tab" aria-controls="tab-cancelled" aria-selected="false">Cancelled</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tab-requested" role="tabpanel" aria-labelledby="requested-tab">
                                    <div class="mt-3">

                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">UserName</th>
                                                    <th class="text-end" scope="col">book</th>
                                                    <th scope="col">Cancelled</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($requested as $request)
                                                    <tr>
                                                        <td> {{ $request->user->name }}</td>
                                                        <td><a href="{{ route('user.books.show' , $request->book->id) }}">{{ $request->book->title }}</a></td>
                                                        <td>
                                                            {!! Form::open(['route' => ['user.orders.destroy', $request->id ] , 'method' => 'DELETE']) !!}
                                                            {!! Form::submit('Cancelled' , ['class' => 'btn btn-outline-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-accepted" role="tabpanel" aria-labelledby="accepted-tab">
                                    <div class="mt-3">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">UserName</th>
                                                    <th class="" scope="col">book</th>
                                                    <th scope="col">Cancelled</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($accepted as $accept)
                                                    <tr>
                                                        <td> {{ $accept->user->name }}</td>
                                                        <td><a href="{{ route('user.books.show' , $accept->book->id) }}">{{ $accept->book->title }}</a></td>
                                                        <td>
                                                            {!! Form::open(['route' => ['user.orders.destroy', $accept->id ] , 'method' => 'DELETE']) !!}
                                                            {!! Form::submit('Cancelled' , ['class' => 'btn btn-outline-danger']) !!}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-served" role="tabpanel" aria-labelledby="served-tab">
                                    <div class="mt-3">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">UserName</th>
                                                    <th class="text-end" scope="col">book</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($served as $order)
                                                    <tr>
                                                        <td> {{ $order->user->name }}</td>
                                                        <td><a href="{{ route('user.books.show' , $order->book->id) }}">{{ $order->book->title }}</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                                    <div class="mt-3">
                                        <div class="table-responsive scrollbar">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">UserName</th>
                                                    <th class="text-end" scope="col">book</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($cancelled as $order)
                                                    <tr>
                                                        <td> {{ $order->user->name }}</td>
                                                        <td><a href="{{ route('user.books.show' , $order->book->id) }}">{{ $order->book->title }}</a></td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
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
@endsection
