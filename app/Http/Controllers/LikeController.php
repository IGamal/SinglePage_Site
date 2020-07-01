<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likeIt(Reply $reply)
    {
        $reply->like()->create(['user_id' => auth()->id()]);

        broadcast(new LikeEvent($reply->id, 1))->toOthers();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function unlikeIt(Reply $reply)
    {
        $reply->like()->where('user_id', auth()->id())->first()->delete();

        broadcast(new LikeEvent($reply->id, 0))->toOthers();
    }
}
