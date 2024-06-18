<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Exports\ClientsExport;
use App\Exports\HousesExport;
use App\Models\Houses;
use Illuminate\Support\Facades\Response;

class ReportGenerator extends Controller
{
    //
    public function generateClientReport(Request $request)
    {
        $format = $request->input('format');

        switch ($format) {
            case 'csv':
                return Excel::download(new ClientsExport, 'clients.csv');
            case 'excel':
                return Excel::download(new ClientsExport, 'clients.xlsx');
            case 'pdf':
                $clients = Clients::all();
                $pdf = PDF::loadView('reports.clients', compact('clients'));
                return $pdf->download('clients.pdf');
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }
    }
    public function generateHousesReport(Request $request)
    {
        $format = $request->input('format');

        switch ($format) {
            case 'csv':
                return Excel::download(new HousesExport, 'houses.csv');
            case 'excel':
                return Excel::download(new HousesExport, 'houses.xlsx');
            case 'pdf':
                $houses = Houses::all();
                $pdf = PDF::loadView('reports.houses', compact('houses'));
                return $pdf->download('houses.pdf');
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }
    }
}
