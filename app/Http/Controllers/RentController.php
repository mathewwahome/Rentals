<?php

namespace App\Http\Controllers;

use App\Models\RentBills;
use Illuminate\Http\Request;

class RentController extends Controller
{
    //
    public function MonthlyRentBill(Request $request)
    {
        $rent = new RentBills();
        $rent->client_id = $request->client_id;
        $pbalance = (float) RentBills::where('client_id', $request->client_id)
            ->orderBy('id', 'desc')
            ->value('balance');
        $amount = $request->amount;
        $amount = (float) $request->amount;
        $balance = $pbalance + $amount;
        $rent->balance = $balance;
        $rent->previous_bill = $pbalance;

        if ($balance < 0) {
            $rent->unpaid_bill = abs($balance);
        } else {
            $rent->unpaid_bill = 0;
        }

        $rent->overdue_bill = $rent->unpaid_bill;
        $rent->payed_bill = $request->amount;

        $rent->total_bill = $request->amount;


        $rent->save();

        return redirect()->back();
    }
}
