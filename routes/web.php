<?php

use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('Eventos.index');
});

Auth::routes();

Route::resource('Eventos', EventosController::class);