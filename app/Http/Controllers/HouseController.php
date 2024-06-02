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
            'houses' => 'required|file|mimes:xls,xlsx',
        ]);
        Excel::import(new HousesImport, $request->file('houses'));
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
    public function getHousesByClientId($clientId)
    {
        $houses = Clients::where('id', $clientId)->get(['house_no']);
        return response()->json($houses);
    }
      // Function to get client name based on house number
      public function getClientNameByHouse($houseNo)
      {
          // Fetch the client name from the database based on the house number
          $house = Houses::where('house_no', $houseNo)->first();
          if ($house) {
              $clientId = $house->client_id;
              $client = Clients::find($clientId);
              if ($client) {
                  return response()->json(['client_name' => $client->name]);
              } else {
                  return response()->json(['error' => 'Client not found'], 404);
              }
          } else {
              return response()->json(['error' => 'House not found'], 404);
          }
      }
}
