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
    public function viewclients()
    {
        return view('dashboard.pages.client.client');
    }

    public function singleclient($client)
    {
        $client = Clients::find($client);
        return view('dashboard.pages.client.single-client',  compact('client'));
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
}
