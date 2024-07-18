<?php

use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('arsip_surat.index');
});

Route::get('/about', function () {
    return view('about.index');
});


Route::resources([
    'arsip' => ArsipController::class,
    'kategori' => KategoriController::class,
]);

Route::get('/arsip/download/pdf/{id}', [ArsipController::class, 'download'])->name('arsip.download');

