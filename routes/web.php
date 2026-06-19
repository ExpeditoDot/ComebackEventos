<?php

use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Loader\Configurator\Routes;

Route::get('/', [EventosController::class, 'index']);
Route::get('/create' , [EventosController::class, 'eventos.create']);
Route::get('/eventos' , [EventosController::class, 'ListarEventos'])->name('eventos');
Route::get('/tabela' , [EventosController::class, 'TabelaEventos'])->name('table');



Auth::routes();

Route::get('/user', [ProfileController::class, 'edit'])
->name('user');

Route::put('/user', [ProfileController::class, 'update'])
->name('user');

Route::resource('eventos', EventosController::class);