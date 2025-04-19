<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class TestExportPdfController extends Controller
{
    public function testExportPdf()
    {
        $data = [
            'title' => '請求書',
            'date' => '2024年11月分請求書',
            'amount' => '¥817,460'
        ];

        $html = view('pdf.japanese', compact('data'))->render();

        $mpdf = new Mpdf([
            'mode' => 'ja',
            'format' => 'A4',
            'default_font' => 'ipaexg',
        ]);

        // Optional: Set a background image
        // $mpdf->SetDefaultBodyCSS('background', "url('" . public_path('images/bg.jpg') . "')");
        $mpdf->SetDefaultBodyCSS('background-image-resize', 6); // Stretch to fit

        $mpdf->WriteHTML($html);

        return response($mpdf->Output('', 'S'), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="invoice.pdf"');
    }
}
