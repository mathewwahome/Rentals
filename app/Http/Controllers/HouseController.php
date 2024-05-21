<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\HousesImport;
use App\Models\Clients;
use App\Models\Houses;
use Maatwebsite\Excel\Facades\Excel;

class HouseController extends Controller
{
    //
    public function import(Request $request)
    {
        $request->validate([
            'username2' => 'required|file|mimes:xls,xlsx',
        ]);
        Excel::import(new HousesImport, $request->file('username2'));
        return redirect()->back()->with('success', 'Data imported successfully.');
    }

    public function singlehouse($house)
    {
        $house = Houses::find($house);
        $clients = Clients::where('house_no', $house->house_no)->get();
        if ($clients->isNotEmpty()) {
            $client = $clients->first();
            
            return view('dashboard.pages.houses.single-house', compact('client', 'house'));
        } else {
            $client = (object)[
                'id' => '0',
                'client_name' => 'No client found for this house.',
                'house_no' => 'No client found for this house.',
                'email' => 'No client found for this house.',
                'phone' => 'No client found for this house.',
            ];

            return view('dashboard.pages.houses.single-house', compact('client', 'house'));
        }
    }
}
