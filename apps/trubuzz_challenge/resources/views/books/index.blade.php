@extends('layouts.master')

@section('content')

    <h1>{{ $username or  'ALL' }}Books <a href="{{ url('books/create') }}" class="btn btn-primary pull-right btn-sm">Add New Book</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Title</th><th>Description</th><th>Created Time</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($books as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('books', $item->id) }}">{{ $item->title }}</a></td><td>{{ $item->description }}</td><td>{{ $item->created_time }}</td>
                    <td>
                        <a href="{{ url('books/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['books', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $books->render() !!} </div>
    </div>

@endsection
