<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PessoaController;
use App\Models\Pessoa;

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
    return view('welcome');
});

Route::get('create_pessoa', function () {
    return view('create_pessoa');
});

Route::get('/listapessoas', [PessoaController::class, 'listarpessoas']);

Route::post('/inserir-pessoa', [PessoaController::class, 'store']);

Route::get('/excluir/{id}',function($id){
    $pessoa = Pessoa::find($id);
    $pessoa->delete();

    echo '<alert>Excluido com Sucesso!!!</alert>';
    echo '<br><br><a href="/listapessoas">Voltar para a Listagem</a>';
    echo '<br><br><a href="/">inicio</a>';
});