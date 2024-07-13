<?php

namespace App\Imports;

use App\Models\Tenant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Log;

class ClientsImport implements ToModel,  WithHeadingRow
{

    public function model(array $row)
    {

        try {
            return new Tenant([
                'client_name' => $row['client_name'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'id_number' => $row['id_number'] ?? null,
                'house_no' => $row['house_no'],
                'status' => $row['status'],
                'entry_date' => $row['entry_date'],
            ]);
        } catch (\Exception $e) {
            Log::error('Error importing client: ' . $e->getMessage());
        }
    }
}
