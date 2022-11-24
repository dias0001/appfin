<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovimentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

///////////// ROTAS PARA USUÁRIO LOGADO

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    

    //Rota Seus Dados
    Route::get(
        '/seus_dados',
        function () {
            return view('seus_dados');
        }
    )->name('seus_dados');

    //Rota Nova Entrada - cadastro de receita ou despesa
    Route::get(
        '/nova_entrada',
        function () {
            return view('nova_entrada');
        }
    )->name('nova_entrada');

    //Rota Seus Gastos - Gráfico de despesas X receitas
    Route::get(
        '/seus_gastos',
        function () {
            return view('seus_gastos');
        }
    )->name('seus_gastos');
    // Route::get('/')

    // Rota para inserção no BD dos movimentos - C do crud
    
    Route::post('/processa', [MovimentoController::class, 'gravar'])->name('processa');

    //Rota extrato - R  do crud
    Route::get('/extrato', [MovimentoController::class, 'get_movimentos'])->name('extrato');

    // Rotas para o UPDATE - U do Crud - uma rota para o formulário de atualização
    Route::get('/editar/{id}', [MovimentoController::class, 'get_movimento'] )->name('editar');

    // Rota para processar a atualização
    Route::put('/atualiza', [MovimentoController::class, 'atualizar'] )->name('atualiza');

    // Rota para deletar movimentos
    Route::delete('/deletar/{id}', [MovimentoController::class, 'deletar'] )->name('deletar');
});