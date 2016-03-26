@extends('layouts.master')

@section('content')

    <h1>Book</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Title</th><th>Description</th><th>Created Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $book->id }}</td> <td> {{ $book->title }} </td><td> {{ $book->description }} </td><td> {{ $book->created_time }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection