<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

Route::get('/', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::get('/daftar', [BeasiswaController::class, 'create'])->name('beasiswa.create'); // Route untuk menampilkan form pendaftaran
Route::post('/daftar', [BeasiswaController::class, 'daftar'])->name('beasiswa.daftar'); // Route untuk submit form pendaftaran
Route::get('/hasil/{id}', [BeasiswaController::class, 'hasil'])->name('beasiswa.hasil');
