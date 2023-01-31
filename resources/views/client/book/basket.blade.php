@extends('layout.master')

@section('title', 'My orders')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('common.success')
            <div class="table-responsive scrollbar">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Show</th>
                        <th scope="col">Delete from basket</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>
                                <a href="{{ route('books.client' , $book->id) }}">Details</a>
                            </td>
                            <td>
                                {!! Form::open(['route' => ['client.books.out-basket', $book->id ] , 'method' => 'DELETE']) !!}
                                   {!! Form::submit('Delete' , ['class' => 'btn btn-outline-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
