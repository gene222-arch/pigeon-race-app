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
        $qrCodes = QrCodeGenerator::query()
            ->where('is_printed', false)
            ->get();

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

        QrCodeGenerator::query()
            ->where('is_printed', false)
            ->update([
                'is_printed' => true
            ]);
        
        return $pdf->stream('qrcode.pdf');
    }
}
