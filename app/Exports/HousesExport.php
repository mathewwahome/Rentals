<?php

namespace App\Exports;

use App\Models\Houses;
use Maatwebsite\Excel\Concerns\FromCollection;

class HousesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Houses::all();
    }
}
