<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\LaravelPdf\Facades\Pdf;

class PdfController extends Controller
{
    public function generatePdf()
    {
        // Create PDF from HTML or URL using Browsershot
        // Render a Blade view into an HTML string
        $html = view('pdf-template', ['title' => 'PDF Generated from Blade View'])->render();

        // Generate PDF from the Blade view
        $pdf = Pdf::html($html)
                    ->orientation('portrait');

        // Download the PDF
        return $pdf->download('blade-example.pdf');
    }

    public function getTempCase() {
        $data = [
            'title' => 'PDF Generated from Blade View',
        ];

        $url_view = "pdf-template";
        return view($url_view, $data);
    }
}
