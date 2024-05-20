<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }
    public function viewclients()
    {
        return view('dashboard.pages.client.client');
    }
    public function newclients()
    {
        return view('dashboard.pages.client.newclient');
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
    public function adminsettings(){
        return view('dashboard.pages.admin.admin');
    }  public function admintheme(){
        return view('dashboard.pages.admin.theme');
    }
    //
}
