<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;


// 1. Tela Inicial padrão (Com os botões de Login e Cadastro no topo)
Route::get('/', function () {
    return view('welcome'); // Carrega a tela com o logo do Laravel e os botões
});

// 2. Rota do Dashboard (Quando faz Login/Cadastro, o Breeze joga para cá)
// Mudamos para que ela chame direto a sua tela preta do AdminLTE!
Route::get('/dashboard', [EventosController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// 3. Outras rotas do seu sistema protegidas por Login
Route::middleware(['auth'])->group(function () {
    Route::get('/create', [EventosController::class, 'eventos.create'])->name('eventos.create');
    Route::get('/eventos', [EventosController::class, 'ListarEventos'])->name('eventos');
    Route::get('/tabela', [EventosController::class, 'TabelaEventos'])->name('table');
    
    // Rotas de perfil automáticas do Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/', [EventosController::class, 'index']);
Route::get('/create' , [EventosController::class, 'eventos.create']);
Route::get('/eventos' , [EventosController::class, 'ListarEventos'])->name('eventos');
Route::get('/tabela' , [EventosController::class, 'TabelaEventos'])->name('table');
Route::get('/home', [EventosController::class, 'index']);

//Auth::routes();
