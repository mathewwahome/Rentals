<?php

namespace App\Http\Controllers;

use App\Models\RentBills;
use App\Models\TransactionHistory;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    //
    public function accounting()
    {
        return view('dashboard.pages.bills.accounting.accounting');
    }

    public function singlePayment(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:rent_bills,client_id',
            'amount' => 'required|numeric|min:0'
        ]);
        $rent = RentBills::where('client_id', $request->client_id)->first();
        if ($rent) {
            $rent->balance += $request->amount;
        } else {
            $rent = new RentBills();
            $rent->client_id = $request->client_id;
            $rent->balance = $request->amount;
            $rent->payed_bill = 0;
            $rent->total_bill = 0;
            $rent->previous_bill = 0;
            $rent->unpaid_bill = 0;
            $rent->overdue_bill = 0;
        }
        $save = $rent->save();
        if ($save) {
            $rent = new TransactionHistory();
            $rent->client_id = $request->client_id;
            $rent->amount = $request->amount;
            $rent->payment_date =$request->payment_date;
            $rent->house_no = $request->house_no;
            $rent->save();
        }
        return redirect()->back()->with('success', 'Payment successfully processed.');
    }
}
