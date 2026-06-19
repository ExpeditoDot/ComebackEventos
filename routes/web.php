<?php

use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [EventosController::class, 'index']);
Route::get('/create' , [EventosController::class, 'eventos.create']);
Route::get('/eventos' , [EventosController::class, 'ListarEventos'])->name('eventos');
Route::get('/tabela' , [EventosController::class, 'TabelaEventos'])->name('table');
Route::get('/home', [EventosController::class, 'index']);

Auth::routes();
