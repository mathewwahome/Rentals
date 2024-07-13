<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\WaterBillsExport;
use App\Template\ClientsTemplateExport;
use App\Imports\WaterBillsReadings;
use App\Models\WaterBills;

class ExcelController extends Controller
{
    //
    public function WaterTemplateDownload()
    {

        return Excel::download(new WaterBillsExport, 'MeterReadings.xlsx');
    }

  

    public function ClientsImportTemplate(Request $request)
    {
        return Excel::download(new ClientsTemplateExport, 'Tenants.xlsx');
    }
}
