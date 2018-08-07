<?php

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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('gestao/produtos/getProdutos', 'ProdutoController@getProdutos')
    ->name('produtos.getProdutos');

Route::get('gestao/fornecedores/getFornecedores', 'FornecedorController@getFornecedores')
    ->name('fornecedores.getFornecedores');

Route::get('gestao/clientes/getClientes', 'ClienteController@getClientes')
    ->name('clientes.getClientes');

Route::get('gestao/colaboradores/getColaboradores', 'ColaboradorController@getColaboradores')
    ->name('colaboradores.getColaboradores');



Route::resource('gestao/produtos', 'ProdutoController');

Route::resource('gestao/fornecedores', 'FornecedorController');

Route::resource('gestao/clientes', 'ClienteController');

Route::resource('gestao/colaboradores', 'ColaboradorController');

Route::get('gestao/fornecedores/create', 'FornecedorController@create')
    ->name('fornecedores.create');

Route::post('gestao/fornecedores/store', 'FornecedorController@store');

Route::get('gestao/clientes/create', 'ClienteController@create')
    ->name('clientes.create');

Route::post('gestao/clientes/store', 'ClienteController@store');
