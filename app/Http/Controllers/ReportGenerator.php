<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Exports\ClientsExport;
use App\Exports\HousesExport;
use App\Reports\WaterBillReports;
use App\Reports\UsersReports;
use App\Reports\RentReport;
use App\Models\Houses;
use App\Models\RentBills;
use App\Models\Reports;
use App\Models\WaterBills;
use App\Models\WebUsers;
use Illuminate\Support\Facades\Response;

class ReportGenerator extends Controller
{
    //
    public function generateClientReport(Request $request)
    {
        $format = $request->input('format');
        $report_type = $request->input('report_type');
        $series = $report_type . '-R-' . substr(uniqid(), -5);
        $fileName =  $series  . '.' . $format;
        $reportPath = 'reports/' . $fileName;
        $clients = Tenant::all();

        switch ($format) {
            case 'csv':
                Excel::store(new ClientsExport, $reportPath);
                break;
            case 'xlsx':
                Excel::store(new ClientsExport, $reportPath);
                break;
            case 'pdf':
                $pdf = PDF::loadView('reports.clients', compact('clients'));
                $pdf->save(storage_path('app/' . $reportPath));
                break;
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }
        Reports::create([
            'report_id' => $series,
            'report_type' => $report_type,
            'report_date' => now(),
            'report_path' => 'storage/' . $reportPath,
        ]);

        return response()->download(storage_path('app/' . $reportPath));
    }
    public function generateHousesReport(Request $request)
    {
        $format = $request->input('format');
        $report_type = $request->input('report_type');
        $series = $report_type . '-R-' . substr(uniqid(), -5);
        $fileName = $series . '.' . $format;
        $reportPath = 'reports/' . $fileName;
        $houses = Houses::all();

        switch ($format) {
            case 'csv':
                Excel::store(new HousesExport, $reportPath);
                break;
            case 'xlsx':
                Excel::store(new HousesExport, $reportPath);
                break;
            case 'pdf':
                $pdf = PDF::loadView('reports.houses', compact('houses'));
                $pdf->save(storage_path('app/' . $reportPath));
                break;
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }

        Reports::create([
            'report_id' => $series,
            'report_type' => $report_type,
            'report_date' => now(),
            'report_path' => $reportPath,
        ]);

        return response()->download(storage_path('app/' . $reportPath));
    }
    //UsersReports
    public function generateUsersReport(Request $request)
    {
        $format = $request->input('format');
        $report_type = $request->input('report_type');
        $series = $report_type . '-R-' . substr(uniqid(), -5);
        $fileName = $series . '.' . $format;
        $reportPath = 'reports/' . $fileName;
        $users = WebUsers::all();

        switch ($format) {
            case 'csv':
                Excel::store(new UsersReports, $reportPath);
                break;
            case 'xlsx':
                Excel::store(new UsersReports, $reportPath);
                break;
            case 'pdf':
                $pdf = PDF::loadView('reports.users', compact('users'));
                $pdf->save(storage_path('app/' . $reportPath));
                break;
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }

        Reports::create([
            'report_id' => $series,
            'report_type' => $report_type,
            'report_date' => now(),
            'report_path' => $reportPath,
        ]);

        return response()->download(storage_path('app/' . $reportPath));
    }



    // generateWaterBillReport
    public function generateWaterBillReport(Request $request)
    {
        $format = $request->input('format');
        $report_type = $request->input('report_type');
        $series = $report_type . '-R-' . substr(uniqid(), -5);
        $fileName = $series . '.' . $format;
        $reportPath = 'reports/' . $fileName;
        $water_bills = WaterBills::all();

        switch ($format) {
            case 'csv':
                Excel::store(new WaterBillReports, $reportPath);
                break;
            case 'xlsx':
                Excel::store(new WaterBillReports, $reportPath);
                break;
            case 'pdf':
                $pdf = PDF::loadView('reports.water_bill', compact('water_bills'));
                $pdf->save(storage_path('app/' . $reportPath));
                break;
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }

        Reports::create([
            'report_id' => $series,
            'report_type' => $report_type,
            'report_date' => now(),
            'report_path' => $reportPath,
        ]);

        return response()->download(storage_path('app/' . $reportPath));
    }
    public function generateRentReport(Request $request){
        $format = $request->input('format');
        $report_type = $request->input('report_type');
        $series = $report_type . '-R-' . substr(uniqid(), -5);
        $fileName = $series . '.' . $format;
        $reportPath = 'reports/' . $fileName;
        $rent = RentBills::all();

        switch ($format) {
            case 'csv':
                Excel::store(new RentReport, $reportPath);
                break;
            case 'xlsx':
                Excel::store(new RentReport, $reportPath);
                break;
            case 'pdf':
                $pdf = PDF::loadView('reports.rent', compact('rent'));
                $pdf->save(storage_path('app/' . $reportPath));
                break;
            default:
                return redirect()->back()->with('error', 'Invalid format selected');
        }

        Reports::create([
            'report_id' => $series,
            'report_type' => $report_type,
            'report_date' => now(),
            'report_path' => $reportPath,
        ]);

        return response()->download(storage_path('app/' . $reportPath));
    }
}
