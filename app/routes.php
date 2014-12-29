<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('/', 'HomeController@index');

Route::get('/cliente', 'ClienteController@index');
Route::post('/cliente/editar/{id}', 'ClienteController@editar');
Route::get('/cliente/editar/{id}', 'ClienteController@editar');
Route::get('/cliente/desativar/{id}', 'ClienteController@desativar');
Route::get('/cliente/ativar/{id}', 'ClienteController@ativar');
Route::get('/cliente/excluir/{id}', 'ClienteController@excluir');


Route::get('/atendimento', 'ClienteController@index');
Route::get('/docs', 'ClienteController@index');
Route::get('/newsletter', 'ClienteController@index');