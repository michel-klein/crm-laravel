<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;

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

Route::get('/login', function () {
    return 'Login';
})->name('site.login');

Route::prefix('/app')->group(function () {
    Route::get('/clientes', function () {
        return 'clientes';
    }
    )->name('app.clientes');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');

    Route::get('/produtos', function () {
        return 'produtos';
    }
    )->name('app.produtos');
});

// Route::get('/contato/{nome}/{categoria_id}', function (string $nome, int $categoria_id = 1) {
//     echo "Estamos aqui, $nome $categoria_id";
// })->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.index') . '">clique aqui</a> para retornar a página principal';
});
