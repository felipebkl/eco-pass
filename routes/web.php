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


Route::get('/usuarios', 'usuariosController@index');


Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Auth::routes();
//rotas da especie
    Route::get('especies', 'EspeciesController@index');
    Route::get('especies/novo', 'EspeciesController@novo');
    Route::get('especies/{especie}/editar', 'EspeciesController@editar');
    Route::post('especies/salvar', 'EspeciesController@salvar');
    Route::patch('especies/{especie}', 'EspeciesController@atualizar');
    Route::delete('especies/{especie}', 'EspeciesController@deletar');
//rotas do sexo
    Route::get('sexos', 'SexosController@index');
    Route::get('sexos/novo', 'SexosController@novo');
    Route::get('sexos/{sexo}/editar', 'SexosController@editar');
    Route::post('sexos/salvar', 'SexosController@salvar');
    Route::patch('sexos/{sexo}', 'SexosController@atualizar');
    Route::delete('sexos/{sexo}', 'SexosController@deletar');
//rotas do passaro


    Route::get('passaros', 'PassarosController@index');
    Route::get('passaros/novo', 'PassarosController@novo');
    Route::get('passaros/{passaro}/editar', 'PassarosController@editar');
    Route::post('passaros/salvar', 'PassarosController@salvar');
    Route::patch('passaros/{passaro}', 'PassarosController@atualizar');
    Route::delete('passaros/{passaro}', 'PassarosController@deletar');
    Route::get('passaros/{passaro}/busca', 'PassarosController@buscarPassaro');


    Route::get('/home', 'HomeController@index')->name('home');
});


Route::get('/home', 'HomeController@index')->name('home');
