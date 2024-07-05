<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(){
        return view("dashboard.pages.report.index");
    }

    public function show(Request $request)
    {
        $report_type = $request->query('report');

        return view('dashboard.pages.report.components.single_report_view', ['report_type' => $report_type]);
    }
}
