<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware'=>'auth'], function(){

    Route::group(['prefix'=>'cliente', 'where'=>['id'=>'[0-9]+']], function(){
    Route::any('',              ['as'=>'cliente',          'uses'=>'App\Http\Controllers\clienteController@index']);
    Route::get('create',        ['as'=>'cliente.create',   'uses'=>'App\Http\Controllers\clienteController@create']);
    Route::post('store',        ['as'=>'cliente.store',    'uses'=>'App\Http\Controllers\clienteController@store']);
    Route::get('{id}/destroy',  ['as'=>'cliente.destroy',  'uses'=>'App\Http\Controllers\clienteController@destroy']);
    Route::get('edit',     ['as'=>'cliente.edit',     'uses'=>'App\Http\Controllers\clienteController@edit']);
    Route::put('{id}/update',   ['as'=>'cliente.update',   'uses'=>'App\Http\Controllers\clienteController@update']);
    });

    Route::group(['prefix'=>'usuario', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'usuario',          'uses'=>'App\Http\Controllers\usuarioController@index']);
        Route::get('create',        ['as'=>'usuario.create',   'uses'=>'App\Http\Controllers\usuarioController@create']);
        Route::post('store',        ['as'=>'usuario.store',    'uses'=>'App\Http\Controllers\usuarioController@store']);
        Route::get('{id}/destroy',  ['as'=>'usuario.destroy',  'uses'=>'App\Http\Controllers\usuarioController@destroy']);
        Route::get('edit',     ['as'=>'usuario.edit',     'uses'=>'App\Http\Controllers\usuarioController@edit']);
        Route::put('{id}/update',   ['as'=>'usuario.update',   'uses'=>'App\Http\Controllers\usuarioController@update']);
        });

    Route::group(['prefix'=>'servico', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'servico',          'uses'=>'App\Http\Controllers\servicoController@index']);
        Route::get('create',        ['as'=>'servico.create',   'uses'=>'App\Http\Controllers\servicoController@create']);
        Route::post('store',        ['as'=>'servico.store',    'uses'=>'App\Http\Controllers\servicoController@store']);
        Route::get('{id}/destroy',  ['as'=>'servico.destroy',  'uses'=>'App\Http\Controllers\servicoController@destroy']);
        Route::get('edit',     ['as'=>'servico.edit',     'uses'=>'App\Http\Controllers\servicoController@edit']);
        Route::put('{id}/update',   ['as'=>'servico.update',   'uses'=>'App\Http\Controllers\servicoController@update']);
        });


    Route::group(['prefix'=>'produto', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'produto',          'uses'=>'App\Http\Controllers\produtoController@index']);
        Route::get('create',        ['as'=>'produto.create',   'uses'=>'App\Http\Controllers\produtoController@create']);
        Route::post('store',        ['as'=>'produto.store',    'uses'=>'App\Http\Controllers\produtoController@store']);
        Route::get('{id}/destroy',  ['as'=>'produto.destroy',  'uses'=>'App\Http\Controllers\produtoController@destroy']);
        Route::get('edit',     ['as'=>'produto.edit',     'uses'=>'App\Http\Controllers\produtoController@edit']);
        Route::put('{id}/update',   ['as'=>'produto.update',   'uses'=>'App\Http\Controllers\produtoController@update']);
        });


    Route::group(['prefix'=>'agendamento', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'agendamento',          'uses'=>'App\Http\Controllers\agendamentoController@index']);
        Route::get('create',        ['as'=>'agendamento.create',   'uses'=>'App\Http\Controllers\agendamentoController@create']);
        Route::post('store',        ['as'=>'agendamento.store',    'uses'=>'App\Http\Controllers\agendamentoController@store']);
        Route::get('{id}/destroy',  ['as'=>'agendamento.destroy',  'uses'=>'App\Http\Controllers\agendamentoController@destroy']);
        Route::get('edit',     ['as'=>'agendamento.edit',     'uses'=>'App\Http\Controllers\agendamentoController@edit']);
        Route::put('{id}/update',   ['as'=>'agendamento.update',   'uses'=>'App\Http\Controllers\agendamentoController@update']);
        });


    Route::group(['prefix'=>'executor', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'executor',          'uses'=>'App\Http\Controllers\executorController@index']);
        Route::get('create',        ['as'=>'executor.create',   'uses'=>'App\Http\Controllers\executorController@create']);
        Route::post('store',        ['as'=>'executor.store',    'uses'=>'App\Http\Controllers\executorController@store']);
        Route::get('{id}/destroy',  ['as'=>'executor.destroy',  'uses'=>'App\Http\Controllers\executorController@destroy']);
        Route::get('edit',     ['as'=>'executor.edit',     'uses'=>'App\Http\Controllers\executorController@edit']);
        Route::put('{id}/update',   ['as'=>'executor.update',   'uses'=>'App\Http\Controllers\executorController@update']);
        });


    Route::group(['prefix'=>'especialidade', 'where'=>['id'=>'[0-9]+']], function(){
        Route::any('',              ['as'=>'especialidade',          'uses'=>'App\Http\Controllers\especialidadeController@index']);
        Route::get('create',        ['as'=>'especialidade.create',   'uses'=>'App\Http\Controllers\especialidadeController@create']);
        Route::post('store',        ['as'=>'especialidade.store',    'uses'=>'App\Http\Controllers\especialidadeController@store']);
        Route::get('{id}/destroy',  ['as'=>'especialidade.destroy',  'uses'=>'App\Http\Controllers\especialidadeController@destroy']);
        Route::get('edit',     ['as'=>'especialidade.edit',     'uses'=>'App\Http\Controllers\especialidadeController@edit']);
        Route::put('{id}/update',   ['as'=>'especialidade.update',   'uses'=>'App\Http\Controllers\especialidadeController@update']);
        });

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Auth::routes();


