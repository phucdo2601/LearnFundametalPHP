<?php

namespace App\Http\Controllers;

use App\Exports\StockCardExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestExportCustomExcelController extends Controller
{
    public function downloadExcel01()
    {
        $data = [
            ['card_id' => 'A001', 'status' => '使用中', 'registered_at' => '2025-04-01'],
            ['card_id' => 'A002', 'status' => '未使用', 'registered_at' => '2025-04-05'],
            // Add more rows from DB if needed
        ];

        return Excel::download(new StockCardExport($data), '連盟内在庫カードID_' . now()->format('Ymd') . '.xlsx');
    }
}
