<?php

namespace App\Template;

use App\Models\Clients;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientsTemplateExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return collect([]);
    }
    public function headings(): array
    {
        return [
            'Client Name',
            'Phone',
            'Email',
            'ID Number',
            'House No',
            'Entry Date',
            'Status',
        ];
    }
}
