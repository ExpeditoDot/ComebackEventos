<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;

// 1. ROTA PÚBLICA (Fora do grupo de autenticação)
// Sempre que alguém entrar no site puro, verá a tela com "Logar" e "Cadastrar"
Route::get('/', function () {
    return view('welcome');
});

// 2. GRUPO DE ROTAS PROTEGIDAS (Só acessa quem clicar em Logar e colocar a senha)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard real com dados de resumo
    Route::get('/dashboard', [EventosController::class, 'index'])->name('dashboard');
    Route::get('/admin/dashboard', [EventosController::class, 'index']);

    // Nova Rota para ver os Cards de Cinema
    Route::get('/eventos-cards', [EventosController::class, 'listagemCards'])->name('eventos.cards');

    Route::get('/eventos-tabela', [EventosController::class, 'tabela'])->name('eventos.tabela');
    Route::get('/eventos/{id}/visualizar', [EventosController::class, 'show'])->name('eventos.show');
    
    
    // Todas as rotas do CRUD de Eventos
    Route::resource('eventos', EventosController::class)->except(['index']);

    // Rotas de perfil do Laravel Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 3. Autenticação nativa do Breeze
require __DIR__.'/auth.php';