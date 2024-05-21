<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\HousesImport;
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
    
}
