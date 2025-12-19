<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrabajoController;

Route::get('/', function () {
    return redirect()->route('trabajos.index');
});

Route::resource('trabajos', TrabajoController::class);