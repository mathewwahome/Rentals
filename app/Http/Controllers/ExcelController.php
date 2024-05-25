<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WaterBillsExport;
use App\Imports\WaterBillsReadings;
use App\Models\WaterBills;

class ExcelController extends Controller
{
    //
    public function WaterTemplateDownload()
    {

        return Excel::download(new WaterBillsExport, 'MeterReadings.xlsx');
    }

    public function WaterBillsimport(Request $request)
    {
        $request->validate([
            'meter_readings' => 'required|file|mimes:xls,xlsx',
        ]);

        if ($request->hasFile('meter_readings')) {
            $file = $request->file('meter_readings');
            Excel::import(new WaterBillsReadings, $file);
        }

        return redirect()->back()->with('success', 'Import successful.');
    }
}
