<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
class AdminController extends Controller
{
    //
    public function store(Request $request)
    {
     
        $client = new Clients();
        $client->client_name = $request->client_name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->id_number = $request->id;
        $client->house_no = $request->entry_date;
        $client->entry_date = $request->entry_date;
        $client->save();

        return redirect()->back();
    }
}
