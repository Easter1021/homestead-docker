<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;

use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class UserAttentionsController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request, User $user)
    {
        Auth::user()->attention_users()->attach($user);

        // 傳送通知
        $thread = Thread::create(['subject' => Auth::user()->username."剛才關注你了! :)",]);
        Message::create(['thread_id' => $thread->id,'user_id' => Auth::user()->id,'body' => "目前共有 ".$user->followed_users()->count()."人 關注你。。。。",]);
        Participant::create(['thread_id' => $thread->id,'user_id' => Auth::user()->id,'last_read' => new Carbon,]);
        $thread->addParticipants([$user->id]);

        return view('users.attention', ['item'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function destroy(Request $request, User $user)
    {
        Auth::user()->attention_users()->detach($user);

        return view('users.attention', ['item'=>$user]);
    }

}
