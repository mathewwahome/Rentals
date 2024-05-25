<?php

namespace App\Exports;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class WaterBillsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Clients::select('id', 'client_name', 'house_no')->get();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'House Number',
            'current Readings',
        ];
    }
}
