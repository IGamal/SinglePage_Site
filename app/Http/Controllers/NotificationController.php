<?php

namespace App\Http\Controllers;

use App\Http\Resources\NotificationResourse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
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
