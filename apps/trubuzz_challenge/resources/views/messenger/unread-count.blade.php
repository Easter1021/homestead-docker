<li><a href="{{URL::to('messages')}}">訊息
<?php $count = Auth::user()->newMessagesCount(); ?>
@if($count > 0)
<span class="label label-danger">{!! $count !!}</span>
@endif
</a></li>