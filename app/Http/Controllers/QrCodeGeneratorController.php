<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\QrCodeGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class QrCodeGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = QrCodeGenerator::query()
            ->where([
                [ 'is_used', '=', false ],
                [ 'is_printed', '=', false ]
            ])
            ->get();

        return view('app.qr-code.index', [
            'qrCodes' => $data
        ]);
    }

    public function store()
    {
        for ($i = 0; $i < 50; $i++) { 
            QrCodeGenerator::create([
                'value' => Str::random(8)
            ]);
        }

        return Redirect::route('generate.qrcode.index');
    }

    public function markAllAsUsed()
    {
        QrCodeGenerator::query()->update([
            'is_used' => 1
        ]);

        return Redirect::route('generate.qrcode.index');
    }

    public function clear()
    {
        QrCodeGenerator::query()->delete();

        return Redirect::route('generate.qrcode.index');
    }
}
