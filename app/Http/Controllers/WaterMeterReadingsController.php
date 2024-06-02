<?php

namespace App\Http\Controllers;

use App\Models\WaterBills;
use Illuminate\Http\Request;

class WaterMeterReadingsController extends Controller
{
    //
    public function singlePayment(Request $request)
    {
        $readings = new WaterBills();

        $readings->payment_date = $request->payment_date;
        $readings->amount = $request->amount;
        $readings->house_no = $request->house_no;
        $readings->client_id = $request->client_id;
        $readings->save();
        return redirect()->back();
    }
}
