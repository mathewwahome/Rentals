<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function waterbills()
    {
        return view('dashboard.pages.bills.waterbills.waterbills');
    }
    public function rent()
    {
        return view('dashboard.pages.bills.rent.rent');
    }
    public function houses()
    {
        return view('dashboard.pages.houses.houses');
    }
    public function users()
    {
        return view('dashboard.pages.admin.users');
    }
 
    //
}
