<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::post('/daftar', [BeasiswaController::class, 'daftar'])->name('beasiswa.daftar');
Route::get('/hasil/{id}', [BeasiswaController::class, 'hasil'])->name('beasiswa.hasil');
