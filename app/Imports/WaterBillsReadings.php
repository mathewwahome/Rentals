<?php

namespace App\Imports;

use App\Models\WaterBills;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;
class WaterBillsReadings implements ToModel,  WithHeadingRow
{
  
    public function model(array $row)
    {
        return new WaterBills([
            'month' => $row['id'],
            'no_clients' => $row['id'],
            'status' => $row['id'],
            'current_m_readings' => $row['id'],
            'previous_m_readings' => $row['id'],
            'total_m_readings' => $row['id'],
            'action' => $row['id'],
            'date' =>  Carbon::now(),
            'name' => $row['id'],
            'house_number' => $row['id'],
            'current_m_readings' => $row['id'],
        ]);
    }
}