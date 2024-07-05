<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImporterController extends Controller
{
    //
    public function index(){
        return view("dashboard.pages.importer.index");
    }
}
