<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountingController extends Controller
{
    //
    public function accounting()
    {
        return view('dashboard.pages.bills.accounting.accounting');
    }
    
}
