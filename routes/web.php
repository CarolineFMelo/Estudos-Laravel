<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MeuControlador;
use App\Http\Controllers\ClienteControlador;

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

/* MÉTODOS HTTP
    GET -  utilizado para quando o cliente quer pegar algo do servidor. Ex: pegar todos os produtos para mostrar.
    POST - utilizado para quando o cliente está salvando algo novo. Ex: cadastro de um novo produto.
    DELETE - utilizado para quando o cliente quer apagar um recurso. Ex: apagar um produto.
    PUT e PATCH - utilizados para quando o cliente quer editar e atualizar algo. Ex: editar informações de um produto.
    OPTIONS - utilizado para quando o clinete quer descobrir quais as opções de requisição permitidas em um recurso do servidor.
*/

Route::get('/', function () {
    return view('welcome');
});

// rotas com parâmetros
Route::get('/ola/{nome}', function($nome) {
    echo "Ola! Seja bem vindo, " . $nome . "!";
});

// rotas com parâmetros opcionais
Route::get('/seunome/{nome?}', function($nome=null) {
    if(isset($nome))
        return "Ola! Seja bem vindo, $nome!";
    return "Voce não digitou nenhum nome.";
});

// rotas com parâmetros com regras
Route::get('rotacomregras/{nome}/{n}', function($nome, $n) {
    for($i=0;$i<$n;$i++)
        echo "Ola! Seja bem vindo, $nome! <br>";
}) ->where('nome', '[A-Za-z]+')->where('n', '[0-9]+');

// agrupamento de rotas e nomeação de rotas
Route::prefix('/app')->group(function() {

    Route::get('/', function() {
        return view('app');
    })->name('app');

    Route::get('/user', function() {
        return view('user');
    })->name('app.user');

    Route::get('/profile', function() {
        return view('profile');
    })->name('app.profile');

});

Route::get('/produtos', function() {
    echo "<h1>Produtos</h1>";
    echo "<ol>";
    echo "<li>Notebook</li>";
    echo "<li>Impressora</li>";
    echo "<li>Mouse</li>";
    echo "</ol>";
})->name('meusprodutos');

// redirecionando requisições
Route::redirect('todosprodutos1', 'produtos', 301);

Route::get('todosprodutos2', function() {
    return redirect()->route('meusprodutos');
});

// métodos http
Route::post('/requisicoes', function(Request $request) {
    return 'Hello POST';
});

Route::delete('/requisicoes', function(Request $request) {
    return 'Hello DELETE';
});

Route::put('/requisicoes', function(Request $request) {
    return 'Hello PUT';
});

Route::patch('/requisicoes', function(Request $request) {
    return 'Hello PATCH';
});

Route::options('/requisicoes', function(Request $request) {
    return 'Hello OPTIONS';
});

Route::get('/requisicoes', function(Request $request) {
    return 'Hello GET';
});

// associando rotas e controladores - todas as funções estão no arquivo MeuControlador.php
Route::get('produtos2', [MeuControlador::class, 'produtos2']);
Route::get('nome', [MeuControlador::class, 'getNome']);
Route::get('idade', [MeuControlador::class, 'getIdade']);
Route::get('multiplicar/{n1}/{n2}', [MeuControlador::class, 'multiplicar']);

Route::get('produtos', function() {
    return view('outras.produtos');
})->name('produtos');

Route::get('departamentos', function() {
    return view('outras.departamentos');
})->name('departamentos');

// associando rotas e controladores com requisicoes http - todas as funções estão no arquivo ClienteControlador.php
Route::resource('clientes', ClienteControlador::class);