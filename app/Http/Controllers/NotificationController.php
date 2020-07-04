<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResourse;
use Illuminate\Http\Request;

class NotificationController extends Controller
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

    public function index()
    {
        return
            [
                'read' => NotificationResourse::collection(auth()->user()->readNotifications),
                'unread' => NotificationResourse::collection(auth()->user()->unReadNotifications),
            ];
    }

    public function markAsRead(Request $request)
    {
        auth()->user()->notifications->where('id', $request->id)->markAsRead();
    }
}
