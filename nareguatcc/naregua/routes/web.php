<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaprodutoController;
use App\Http\Controllers\VendaTmpController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\FuncionarioController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\CalendarioController;

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
    
    // Rota de Produto
    Route::resource('produto', ProdutoController::class);
    
    Route::resource('vendaproduto', VendaprodutoController::class);
    Route::resource('vendatmp', VendaTmpController::class);
    Route::resource('cliente', ClienteController::class);

    // Rotas do funcionário
    Route::resource('funcionarios', FuncionarioController::class);
    
    // Rotas de Agendamentos
    Route::resource('agendamentos', AgendamentoController::class);
    
    // Serviços
    Route::resource('servicos', ServicoController::class);

    // Página do calendário
    Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');

    Route::get('api/calendario-eventos', [AgendamentoController::class, 'eventosJson'])->name('agendamentos.eventos');
});

require __DIR__.'/auth.php';
