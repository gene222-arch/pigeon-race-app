<?php

namespace App\Exports;

use \PDF;
use App\Models\QrCodeGenerator;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeExporter extends Controller
{
    public function pdf()
    {
        $qrCodes = QrCodeGenerator::all();

        $toBase64Collections = collect([]);

        $qrCodes->each(function ($qrCode) use ($toBase64Collections) {
            $toBase64Collections
                ->push([
                    'base64' => base64_encode(
                        QrCode::format('svg')
                                    ->size(10)
                                    ->errorCorrection('H')
                                    ->generate($qrCode->value)
                    ),
                    'value' => $qrCode->value
                ]);
        });

        $pdf = PDF::loadView('export.pdf.QrCodeExport', [
            'qrCodes' => $toBase64Collections
        ]);
        
        return $pdf->stream('qrcode.pdf');
    }
}
