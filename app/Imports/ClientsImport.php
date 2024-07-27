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
            $entryDate = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['entry_date'])->format('d-m-Y');

            return new Tenant([
                'client_name' => $row['client_name'] ?? null,
                'phone' => $row['client_name'] ?? null,
                'email' => $row['email'] ?? null,
                'id_number' => $row['id_number'] ?? null,
                'house_no' => $row['house_no'] ?? null,
                'status' => $row['status'] ?? 'active',
                'entry_date' => $entryDate ?? null,
            ]);
        } catch (\Exception $e) {
            Log::error('Error importing client: ' . $e->getMessage());
            Log::error('Row data causing error: ', $row);
        }
    }
}
