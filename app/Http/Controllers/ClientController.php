<?php

namespace App\Http\Controllers;

use App\Models\Clients;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //

    public function newclients()
    {
        return view('dashboard.pages.client.newclient');
    }
    //
    public function store(Request $request)
    {

        $client = new Clients();
        $client->client_name = $request->client_name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->id_number = $request->id;
        $client->house_no = $request->house_no;
        $client->entry_date = $request->entry_date;
        $client->save();

        return redirect()->back();
    }
    public function viewclients()
    {
        return view('dashboard.pages.client.client');
    }



    public function clientview(Request $request)
    {
        $client_id = $request->input('client_id');
        $client = Clients::find($client_id);

        if (!$client) {
            abort(404);
        }
        return view('dashboard.pages.client.single-client', compact('client'));
    }

    public function clientedit($client)
    {
        $client = Clients::find($client);
        return view('dashboard.pages.client.client-edit',  compact('client'));
    }
}
