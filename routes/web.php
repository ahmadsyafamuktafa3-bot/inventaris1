<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index.blade.php');
});

Route::resource('barang', BarangController::class);