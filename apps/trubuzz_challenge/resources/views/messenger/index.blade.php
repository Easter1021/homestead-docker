@extends('layouts.master')

@section('content')
    @if (Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {!! Session::get('error_message') !!}
        </div>
    @endif
    <h1>{{Auth::user()->username}}'s Message Box</h1>
    @if($threads->count() > 0)
        @foreach($threads as $thread)
        <?php $class = $thread->isUnread($currentUserId) ? '<span class="text-danger">[未讀]</span>' : '<span class="text-muted">[已讀]</span>'; ?>
        <div class="media alert">
            <h4 class="media-heading">{!! $class.'&nbsp;'.link_to('messages/' . $thread->id, $thread->subject) !!}</h4>
            <p>{!! $thread->latestMessage->body !!}</p>
            <p><small><strong>Creator:</strong> {!! $thread->creator()->username !!}</small></p>
        </div>
        @endforeach
    @else
        <p>Sorry, no threads.</p>
    @endif
@stop
