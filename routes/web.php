<?php


use App\Http\Controllers\EventosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Routing\Loader\Configurator\Routes;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
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




Auth::routes();

Route::get('/user', [ProfileController::class, 'edit'])
->name('user');

Route::put('/user', [ProfileController::class, 'update'])
->name('user');

Route::resource('eventos', EventosController::class);
//Auth::routes();

