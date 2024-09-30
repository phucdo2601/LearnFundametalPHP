<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    //
    public function generateInvoice()
    {
        // Sample data to pass to the Blade template
        $data = [
            'invoiceDate' => now()->format('F d, Y'),
            'items' => [
                ['name' => 'Product 1', 'price' => 50, 'quantity' => 2],
                ['name' => 'Product 2', 'price' => 30, 'quantity' => 1],
                ['name' => 'Product 3', 'price' => 20, 'quantity' => 5],
            ],
            'total' => 50 * 2 + 30 * 1 + 20 * 5
        ];

        // Load the Blade view and pass the data to it
        $pdf = Pdf::loadView('invoice', $data);

        // Return the generated PDF for download
        return $pdf->download('invoice.pdf');
    }
}
