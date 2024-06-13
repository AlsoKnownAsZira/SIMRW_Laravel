<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CetakPDFController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route untuk landing page
Route::get('/', [LandingPageController::class, 'show'])->name('landing');

// Filament route
Route::middleware(['auth:filament'])->group(function () {
    Filament::serving(function () {
        Filament::auth();
    });
});

Route::post('login', \Filament\Http\Livewire\Auth\Login::class . '@store');

//Route::post('logout', [LandingPageController::class, 'logout'])->name('filament.auth.logout')->middleware('redirectAfterLogout');


Route::get('/kegiatan/{id}/download-pdf', [KegiatanController::class, 'downloadPdf'])->name('filament.kegiatan.downloadPdf');

Route::post('/hasil-topsis/cetak-pdf', [CetakPDFController::class, 'cetakPdf'])->name('filament.topsis.cetakPdf');
