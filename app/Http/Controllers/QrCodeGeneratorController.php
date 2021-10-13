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
        return view('app.qr-code.index', [
            'qrCodes' => QrCodeGenerator::where('is_used', false)->get()
        ]);
    }

    public function store()
    {
        for ($i = 0; $i < 50; $i++) { 
            QrCodeGenerator::create([
                'value' => Str::random(5)
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
