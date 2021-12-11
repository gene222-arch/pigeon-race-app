<?php

use App\Exports\QrCodeExporter;
use App\Http\Controllers\ClubsController;
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

    Route::prefix('generate-qrcode')->group(function () 
    {
        Route::get('/', [QrCodeGeneratorController::class, 'index'])->name('generate.qrcode.index');
        Route::post('/', [QrCodeGeneratorController::class, 'store'])->name('generate.qrcode.store');
        Route::delete('/', [QrCodeGeneratorController::class, 'clear'])->name('generate.qrcode.clear');
        Route::put('mark-all-as-used', [QrCodeGeneratorController::class, 'markAllAsUsed'])
            ->name('generate.qrcode.mark.all.as.used');
    });

    Route::resource('player-events', PlayerEventsController::class);

    Route::prefix('tournaments')->group(function () {
        Route::post('clock-in', [TournamentsController::class, 'clockIn'])->name('tournaments.clock.in');
        Route::get('start-time', [TournamentsController::class, 'startTimeToActiveTournaments'])->name('tournaments.start.time');
        Route::get('restart-time', [TournamentsController::class, 'restartTimeToActiveTournaments'])->name('tournaments.restart.time');
        Route::get('finish', [TournamentsController::class, 'finish'])->name('tournaments.finish');
    });

    Route::resource('tournaments', TournamentsController::class);

    Route::resource('my-pigeons', MyPigeonsController::class);
    Route::resource('coordinates', CoordinatesController::class);
    Route::resource('clubs', ClubsController::class);

    Route::group(['prefix' => 'exports'], function () {
        Route::get('/qr-code', [ QrCodeExporter::class, 'pdf' ])->name('exports.qr.code.pdf');
    });
});
