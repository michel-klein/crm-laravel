<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;

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

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');

Route::get('/sobre', [SobreController::class, 'sobre'])->name('site.sobre');

Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

Route::middleware('autenticacao')->prefix('/app')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('app.home');

    Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::post('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::get('/fornecedores/listar', [FornecedorController::class, 'listar'])->name('app.fornecedores.listar');
    Route::get('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::post('/fornecedores/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedores.adicionar');
    Route::get('/fornecedores/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])->name('app.fornecedores.editar');
    Route::get('/fornecedores/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedores.excluir');

    Route::resource('/produtos', ProdutoController::class);
    Route::resource('/produto-detalhes', ProdutoDetalheController::class);
    Route::resource('/clientes', ClienteController::class);
    Route::resource('/pedidos', PedidoController::class);
    // Route::resource('/pedido-produtos', PedidoProdutoController::class);
    Route::get('pedido-produtos/create/{pedido}', [PedidoProdutoController::class, 'create'])->name('pedido-produtos.create');
    Route::post('pedido-produtos/store/{pedido}', [PedidoProdutoController::class, 'store'])->name('pedido-produtos.store');
    // Route::delete('pedido-produtos/destroy/{pedido}/{produto}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produtos.destroy');
    Route::delete('pedido-produtos/destroy/{pedidoProduto}/{pedido_id}', [PedidoProdutoController::class, 'destroy'])->name('pedido-produtos.destroy');
});

Route::fallback(function () {
    echo 'A rota acessada n??o existe. <a href="' . route('site.index') . '">clique aqui</a> para retornar a p??gina principal';
});
