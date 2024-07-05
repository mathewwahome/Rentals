<?php

namespace App\Reports;

use App\Models\RentBills;
use Maatwebsite\Excel\Concerns\FromCollection;

class RentReport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RentBills::all();
    }
}
