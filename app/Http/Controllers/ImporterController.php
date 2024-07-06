<?php

namespace App\Http\Controllers;

use App\Imports\ClientsImport;
use App\Imports\HousesImport;
use App\Imports\WaterBillsReadings;
use App\Models\Imports;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImporterController extends Controller
{
    //
    public function index()
    {
        return view("dashboard.pages.importer.index");
    }
    public function show(Request $request)
    {
        $import_type = $request->query('imports');
        return view('dashboard.pages.importer.components.single_import_view', ['import_type' => $import_type]);
    }
    public function show_import(Request $request)
    {
        $import_type = $request->query('import');
        return view('dashboard.pages.importer.components.single_import', ['import_type' => $import_type]);
    }



    public function Houses(Request $request)
    {
        $request->validate([
            'houses' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $series = 'IH-' . 'Houses-' . substr(uniqid(), -5);

        $extension = $request->file('houses')->getClientOriginalExtension();

        $fileName = $series . '.' . $extension;

        $filePath = $request->file('houses')->storeAs('imports', $fileName);


        Excel::import(new HousesImport, $filePath);

        Imports::create([
            'import_id' => $series,
            'import_type' => 'houses',
            'import_date' => now(),
            'import_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
    //clients
    public function Clients(Request $request)
    {
        $request->validate([
            'clients' => 'required|file|mimes:xlsx,csv,xls'
        ]);

        $series = 'IC-' . 'Clients-' . substr(uniqid(), -5);

        $extension = $request->file('clients')->getClientOriginalExtension();

        $fileName = $series . '.' . $extension;

        $filePath = $request->file('clients')->storeAs('imports', $fileName);



        Excel::import(new ClientsImport, $filePath);

        Imports::create([
            'import_id' => $series,
            'import_type' => 'clients',
            'import_date' => now(),
            'import_path' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Clients imported successfully.');
    }

    public function WaterBillsimport(Request $request)
    {
        $request->validate([
            'meter_readings' => 'required|file|mimes:xls,xlsx',
        ]);
        $series = 'IMR-' . 'Meter_Readings-' . substr(uniqid(), -5);
        $extension = $request->file('meter_readings')->getClientOriginalExtension();

        $fileName = $series . '.' . $extension;

        $filePath = $request->file('meter_readings')->storeAs('imports', $fileName);

        $file = $request->file('meter_readings');

        Excel::import(new WaterBillsReadings, $file);
        Imports::create([
            'import_id' => $series,
            'import_type' => 'water meter reading',
            'import_date' => now(),
            'import_path' => $filePath,
        ]);


        return redirect()->back()->with('success', 'Import successful.');
    }
}
