<?php

namespace App\Http\Controllers;

use App\Models\Houses;
use App\Models\RentBills;
use App\Models\Tenant;
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

        $client = new Tenant();
        $client->client_name = $request->client_name;
        $client->phone = $request->phone;
        $client->email = $request->email;
        $client->id_number = $request->id;
        $client->house_no = $request->house_no;
        $client->entry_date = $request->entry_date;
        $save = $client->save();
        if ($save) {
            $rentbill = new RentBills();
            $rentbill->client_id =  $client->id;
            $rent = Houses::where('house_no', $client->house_no)->value('price');
            $rentbill->balance = -$rent;
            $rentbill->previous_bill = 0;
            $rentbill->unpaid_bill = $rent;
            $rentbill->overdue_bill = 0;
            $rentbill->payed_bill = 0;
            $rentbill->total_bill = 0;
            $rentbill->save();
        }
        return redirect()->back();
    }
    public function viewclients()
    {
        return view('dashboard.pages.client.client');
    }



    public function clientview(Request $request)
    {
        $client_id = $request->input('client_id');
        $client = Tenant::find($client_id);

        if (!$client) {
            abort(404);
        }
        return view('dashboard.pages.client.single-client', compact('client'));
    }

    public function clientedit($client)
    {
        $client = Tenant::find($client);
        return view('dashboard.pages.client.client-edit',  compact('client'));
    }
}
