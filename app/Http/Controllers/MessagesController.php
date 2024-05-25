<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    //
    public function waterbills()
    {
        return view('dashboard.pages.notifications.outgoing.waterbills');
    }
}
