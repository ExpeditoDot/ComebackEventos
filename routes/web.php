<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventosController;
use Illuminate\Support\Facades\Route;


// 1. ROTA PÚBLICA (Tela de boas-vindas do projeto)


Route::get('/', function () {
    return view('welcome');
});

// 2. ROTAS PROTEGIDAS (Só quem está logado consegue acessar)
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Rota padrão pós-login: Redireciona o usuário direto para a lista de eventos
    Route::get('/dashboard', [EventosController::class, 'index'])->name('dashboard');
    
    // Rota alternativa de segurança (Caso o Breeze force o redirecionamento antigo do admin)
    Route::get('/admin/dashboard', [EventosController::class, 'index']);

    // CRUD COMPLETO DE EVENTOS (Cria rotas para index, create, store, edit, update e destroy)
    Route::resource('eventos', EventosController::class);

    // Rotas de perfil de usuário nativas do Breeze (Podem continuar aqui)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// 3. ARQUIVOS DE AUTENTICAÇÃO (Obrigatório para carregar rotas de login/registro do Breeze)
require __DIR__.'/auth.php';

require __DIR__.'/auth.php';
Route::get('/', [EventosController::class, 'index']);
Route::get('/create' , [EventosController::class, 'eventos.create']);
Route::get('/eventos' , [EventosController::class, 'ListarEventos'])->name('eventos');
Route::get('/tabela' , [EventosController::class, 'TabelaEventos'])->name('table');
Route::get('/home', [EventosController::class, 'index']);

//Auth::routes();

