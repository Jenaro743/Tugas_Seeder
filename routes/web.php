<?php

use App\Http\Controllers\MahasiswaController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Custom routes harus sebelum resource
Route::get('mahasiswa/{mahasiswa}/delete', [MahasiswaController::class, 'confirmDelete'])->name('mahasiswa.confirmDelete');
Route::resource('mahasiswa', MahasiswaController::class);