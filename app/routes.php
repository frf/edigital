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
    Route::get('/cliente/view/{id}', 'ClienteController@view');
    Route::get('/cliente/cadastrar-login/{id}', 'ClienteController@cadastrarLogin');
    Route::get('/cliente/meus-dados', 'ClienteController@meusDados');
    Route::post('/cliente/meus-dados', 'ClienteController@meusDados');
    Route::post('/cliente/cadastrar-login/{id}', 'ClienteController@cadastrarLogin');
    Route::get('/cliente/listar-login/{id}', 'ClienteController@listarLogin');
    Route::get('/cliente/desativar/{id}', 'ClienteController@desativar');
    Route::get('/cliente/ativar/{id}', 'ClienteController@ativar');
    Route::get('/cliente/excluir/{id}', 'ClienteController@excluir');
    Route::get('/cliente/excluir-login/{id}/{idCli}', 'ClienteController@excluirLogin');
    Route::get('/cliente/dados/{id}', 'ClienteController@dadosCliente');
    
    Route::get('/financeiro', 'FinanceiroController@index');
    Route::get('/financeiro/novo-lancamento', 'FinanceiroController@novoLancamento');
    Route::get('/financeiro/pago/{id}', 'FinanceiroController@efetuarPagamento');
    Route::get('/financeiro/pendente/{id}', 'FinanceiroController@efetuarPagamento');
    Route::post('/financeiro/salvar-lancamento', 'FinanceiroController@salvarLancamento');
    
    

    // Controller AtendimentoController.
    Route::get('/atendimento', 'AtendimentoController@index');
    Route::get('/atendimento/cadastrar', 'AtendimentoController@getCadastrar');
    Route::post('/atendimento/cadastrar', 'AtendimentoController@postCadastrar');
    Route::get('/atendimento/cat_chamado', 'AtendimentoController@getCatChamado');
    Route::post('/atendimento/cat_chamado', 'AtendimentoController@postCatChamado');
    Route::get('/atendimento/edi_cat_chamado/{id}', 'AtendimentoController@getEdiCatChamado');
    Route::post('/atendimento/edi_cat_chamado/{id}', 'AtendimentoController@postEdiCatChamado');
    Route::get('/atendimento/del_cat_chamado/{id}', 'AtendimentoController@getDelCatChamado');
    Route::get('/atendimento/historico/{id}', 'AtendimentoController@getHistorico');
    Route::post('/atendimento/historico/{id}', 'AtendimentoController@postHistorico');


    Route::get('/docs', 'ClienteController@index');
    Route::get('/newsletter', 'ClienteController@index');
    

    // Rota de artigos
    Route::controller('home', 'HomeController');
    
    Route::get('sair', 'HomeController@getSair');
});

Route::controller('/documento', 'DocumentoController');
