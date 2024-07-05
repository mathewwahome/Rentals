<?php

namespace App\Reports;

use App\Models\WaterBills;
use Maatwebsite\Excel\Concerns\FromCollection;

class WaterBillReports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WaterBills::all();
    }
}
