<?php

namespace App\Exports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\FromCollection;

class ClientsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tenant::all();
    }
}
