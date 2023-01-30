@extends('layout.master')

@section('title', 'Categories')

@section('content')
    <div class="card">
        <div class="card-body">
            @include('common.success')
            <div class="table-responsive scrollbar">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th class="text-end" scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td class="text-end">
                            <div>
                                <a href="{{ route('common.authors.edit' , $category->id) }}">
                                    <button class="btn p-0" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="text-500 fas fa-edit"></span></button>
                                </a>
                                {!! Form::open(['route' => ['common.categories.destroy' , $category->id] , 'method' => 'delete']) !!}
                                    <button class="btn p-0 ms-2" type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="text-500 fas fa-trash-alt"></span></button>
                                {!! Form::close() !!}
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
