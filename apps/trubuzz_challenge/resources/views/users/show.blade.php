@extends('layouts.master')

@section('content')

    <h1>User</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Username</th><th>Email</th><th>Created Time</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td> <td> {{ $user->username }} </td><td> {{ $user->email }} </td><td> {{ $user->created_time }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection