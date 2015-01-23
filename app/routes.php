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
//Route::get('/', 'HomeController@index');

//Route::when('*', 'csrf', array('post'));
 
// Visitante
Route::get('/',array('as' => 'home','uses' => 'HomeController@index'));
Route::get('entrar', 'HomeController@getEntrar');
Route::post('entrar', 'HomeController@postEntrar');

 
// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{
    Route::get('/cliente', 'ClienteController@index');
    Route::post('/cliente/editar/{id}', 'ClienteController@editar');
    Route::get('/cliente/editar/{id}', 'ClienteController@editar');
    Route::get('/cliente/desativar/{id}', 'ClienteController@desativar');
    Route::get('/cliente/ativar/{id}', 'ClienteController@ativar');
    Route::get('/cliente/excluir/{id}', 'ClienteController@excluir');

    // Controller AtendimentoController.
    Route::get('/atendimento', 'AtendimentoController@index');
    Route::get('/atendimento/cadastrar', 'AtendimentoController@getCadastrar');
    Route::post('/atendimento/cadastrar', 'AtendimentoController@postCadastrar');
    Route::get('/atendimento/historico/{id}', 'AtendimentoController@getHistorico');
    Route::post('/atendimento/historico/{id}', 'AtendimentoController@postHistorico');


    Route::get('/docs', 'ClienteController@index');
    Route::get('/newsletter', 'ClienteController@index');
    

    // Rota de artigos
    Route::controller('home', 'HomeController');
    
    Route::get('sair', 'HomeController@getSair');
});

Route::controller('/documento', 'DocumentoController');
