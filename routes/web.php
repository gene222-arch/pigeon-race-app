<?php

use App\Exports\QrCodeExporter;
use App\Http\Controllers\CoordinatesController;
use App\Http\Controllers\MyPigeonsController;
use App\Http\Controllers\PlayerEventsController;
use App\Http\Controllers\QrCodeGeneratorController;
use App\Http\Controllers\TournamentsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () 
{
    Route::resource('generate-qrcode', QrCodeGeneratorController::class);
    Route::resource('player-events', PlayerEventsController::class);
    Route::resource('tournaments', TournamentsController::class);
    Route::resource('my-pigeons', MyPigeonsController::class);
    Route::resource('coordinates', CoordinatesController::class);

    Route::group(['prefix' => 'exports'], function () {
        Route::get('/qr-code', [ QrCodeExporter::class, 'pdf' ]);
    });
});
