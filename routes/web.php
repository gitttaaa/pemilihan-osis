<?php

use App\Http\Controllers\OsisController;
use Illuminate\Support\Facades\Route;

Route::get('/', [OsisController::class, 'home'])->name('home');
Route::get('/informasi', [OsisController::class, 'informasi'])->name('osis.informasi');
Route::get('/jadwal', [OsisController::class, 'jadwal'])->name('osis.jadwal');
Route::get('/pengumuman', [OsisController::class, 'pengumuman'])->name('osis.pengumuman');

Route::prefix('osis')->group(function () {
    Route::get('/pendaftaran', [OsisController::class, 'index'])->name('osis.pendaftaran');
    Route::post('/submit', [OsisController::class, 'submit'])->name('osis.submit');
    Route::post('/verifikasi/{id}', [OsisController::class, 'verifikasi'])->name('osis.verifikasi');
    Route::delete('/hapus/{id}', [OsisController::class, 'destroy'])->name('osis.destroy');
});