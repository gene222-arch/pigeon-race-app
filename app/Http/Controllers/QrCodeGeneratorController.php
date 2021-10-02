<?php

namespace App\Http\Controllers;

use App\Models\QrCodeGenerator;
use Illuminate\Http\Request;

class QrCodeGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.qr-code.qr-code-generator', [
            'qrCodes' => QrCodeGenerator::all()
        ]);
    }
}
