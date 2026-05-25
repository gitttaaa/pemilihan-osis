<?php

use App\Http\Controllers\OsisController;
use Illuminate\Support\Facades\Route;

// Route Halaman Utama & Informasi Umum
Route::get('/', [OsisController::class, 'home'])->name('home');
Route::get('/informasi', [OsisController::class, 'informasi'])->name('osis.informasi');
Route::get('/jadwal', [OsisController::class, 'jadwal'])->name('osis.jadwal');
Route::get('/pengumuman', [OsisController::class, 'pengumuman'])->name('osis.pengumuman');

// Route Sistem Pendaftaran OSIS Berbasis SPK
Route::prefix('osis')->group(function () {
    // 1. Halaman Awal & Submit Biodata
    Route::get('/pendaftaran', [OsisController::class, 'index'])->name('osis.pendaftaran');
    Route::post('/submit', [OsisController::class, 'submitBiodata'])->name('osis.submit');
    
    // 2. Alur Kuis SPK (Baru)
    Route::get('/quiz', [OsisController::class, 'showQuiz'])->name('osis.quiz');
    Route::post('/quiz/submit', [OsisController::class, 'submitQuiz'])->name('osis.submit_quiz');
    
    // 3. Halaman Hasil Pengumuman SPK (Baru)
    Route::get('/hasil/{id}', [OsisController::class, 'hasil'])->name('osis.hasil');

    // 4. Manajemen Data (Fitur Bawaan Kamu)
    Route::delete('/hapus/{id}', [OsisController::class, 'destroy'])->name('osis.destroy');
});