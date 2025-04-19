<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StockCardExport implements FromArray, WithEvents, WithTitle
{
    protected $datas;

    public function __construct(array $datas)
    {
        $this->datas = $datas;
    }

    public function array(): array
    {
        // Start with header
        $exportData = [
            ['カードID', '状態', '登録日']
        ];

        foreach ($this->datas as $card) {
            $exportData[] = [
                $card['card_id'],
                $card['status'],
                $card['registered_at'],
            ];
        }

        return $exportData;
    }

    public function title(): string
    {
        return '在庫データ';
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                // Start adding summary 5 rows after data ends (adjust if needed)
                $startRow = 5; // adjust based on how many data rows you have
                $summaryStart = $startRow + 3;
                $testVar = count($this->datas);

                $event->sheet->setCellValue("A{$summaryStart}", '在庫コースA');
                $event->sheet->setCellValue("B{$summaryStart}", $testVar);
                $event->sheet->setCellValue("C{$summaryStart}", '※在庫Aの小計を自動的に計算');
                $event->sheet->getDelegate()->getStyle("A{$summaryStart}:C{$summaryStart}")->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FF0000'], // 🔴 Red text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFFF99'],
                    ],
                ]);

                $event->sheet->setCellValue("A" . ($summaryStart + 1), '在庫コースB');
                $event->sheet->setCellValue("B" . ($summaryStart + 1), 11);
                $event->sheet->setCellValue("C" . ($summaryStart + 1), '※在庫Bの小計を自動的に計算');
                $event->sheet->getDelegate()->getStyle("A" . ($summaryStart + 1) . ":C" . ($summaryStart + 1))->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FF0000'], // 🔴 Red text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'CCFFCC'],
                    ],
                ]);

                $event->sheet->setCellValue("A" . ($summaryStart + 2), '合計');
                $event->sheet->setCellValue("B" . ($summaryStart + 2), '=SUM(B' . $summaryStart . ':B' . ($summaryStart + 1) . ')');
                $event->sheet->setCellValue("C" . ($summaryStart + 2), '※合計を自動的に計算');
                $event->sheet->getDelegate()->getStyle("A" . ($summaryStart + 2) . ":C" . ($summaryStart + 2))->applyFromArray([
                    'font' => [
                        'bold' => true,
                        'color' => ['rgb' => 'FF0000'], // 🔴 Red text
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'FFCCCC'],
                    ],
                ]);
            },
        ];
    }
}
