<?php

namespace App\Http\Controllers\generate_pdfs;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class GeneratePdfController extends Controller
{
    public function generatePDF()
    {
        // Pass data to the Blade view
        $data = [
            'customerName' => 'John Doe',
            'totalAmount' => 99.99
        ];

        // Load the Blade view and pass the data to it
        $pdf = Pdf::loadView('generate_pdfs.generate_pdf', $data);
        // stream pdf
        return $pdf->stream('invoice.pdf');
        // Download the PDF file
        return $pdf->download('invoice.pdf');
    }
}
