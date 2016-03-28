@extends('layouts.master')

@section('content')

    <h1>Users <a href="{{ url('users/create') }}" class="btn btn-primary pull-right btn-sm">Add New User</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Username</th><th>Email</th><th>Created Time</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('users', $item->id) }}">{{ $item->username }}</a></td><td>{{ $item->email }}</td><td>{{ $item->created_time }}</td>
                    <td>
                        @include('users.attention') /
                        <a href="{{ url('users/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs">修改</button></a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('刪除', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!} /
                        @if(!Auth::check() or Auth::user()->id != $item->id)
                        <a href="{{ url('login/' . $item->id) }}" class="btn btn-info btn-xs">登入</button></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $users->render() !!} </div>
    </div>

    <script type="text/javascript">
        $('body').on('ajax:success', '.attention', function(event, data, status, xhr) {
           $(this).replaceWith( $(data) ); 
        });
    </script>

@endsection
