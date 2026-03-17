<?php

use Illuminate\Support\Facades\Route;

Route::get('/analisis', function () {
    return view('analisis'); // Llamamos a una vista normal de Blade
});