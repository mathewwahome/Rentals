<?php

namespace App\Reports;

use App\Models\WebUsers;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersReports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return WebUsers::all();
    }
}
