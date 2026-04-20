<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;

Route::get('/', function () {
    return view('layouts.template');
});

Route::get('/beranda', function () {
    // return view('pages.beranda');
    return redirect('/beranda');
});

Route::get('/profil', function () {
    // return view('pages.profil');
    return redirect('/profil');
});

Route::get('/tentang-kami', function () {
    // return view('pages.tentang-kami');
    return redirect('/tentang-kami');
});




