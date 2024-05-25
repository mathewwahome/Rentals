<?php
namespace App\Imports;

use App\Models\Houses;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class HousesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Houses([
            'house_no' => $row['house_no'],
            'rooms' => $row['rooms'],
            'status' => $row['status'],
            'price' => $row['price'],
        ]);
    }
}
