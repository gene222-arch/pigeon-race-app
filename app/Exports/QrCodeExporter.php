<?php

namespace App\Exports;

use \PDF;
use App\Http\Controllers\Controller;

class QrCodeExporter extends Controller
{
    public function pdf()
    {
        $pdf = PDF::loadView('export.pdf.QrCodeExport', []);
        
        return $pdf->stream('qrcode.pdf');
    }
}
