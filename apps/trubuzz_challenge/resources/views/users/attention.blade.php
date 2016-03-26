@if(Auth::check())
	@if(in_array($item->id, Auth::user()->attention_users->map(function ($item, $key) {return $item->id;})->toArray() ))
		<a href="{{ url('users/' . $item->id . '/attention') }}" data-remote=1 data-method="delete" class="btn btn-success btn-xs attention">取消關注</button></a>
	@else
		<a href="{{ url('users/' . $item->id . '/attention') }}" data-remote=1 data-method="post" class="btn btn-success btn-xs attention">關注</button></a>
	@endif
@else
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true" title="登入即可關注他人"></span>
@endif