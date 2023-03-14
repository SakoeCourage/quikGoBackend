<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function notification(){

        return([
            'notifications' => auth()->user()->Notifications()->paginate(15),
            'ureadnotifications' => auth()->user()->unreadNotifications,
        ]);

    }
    public function marknotificationsasread(){

        return([
            'notificationsread' => auth()->user()->unreadNotifications->markAsRead(),
        ]);

    }
}
