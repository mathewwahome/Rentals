<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function inNtf()
    {
        $notifications = "all";
        return view('dashboard.pages.notifications.incomming.incommingnotifications', compact('notifications'));
    }
}
