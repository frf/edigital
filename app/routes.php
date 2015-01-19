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


Route::get('/clientes/docs/listar', function($id=1)
	{
		
		$objDocumento = DocumentosQuery::create() 
			->useClientesQuery() 
			->filterById($id) 
			->endUse();

			return View::make('cliente.listadocs', compact('objDocumento'));

		print "<pre>";
		print $objDocumento->toString();
		print "</pre> <br><br><br>";

print "<pre>";
		foreach($objDocumento as $Doc){
			echo "Documento: " . $Doc->getNomeDocumento();
			echo "<hr>";
			echo " ---- Categoria: " . $Doc->getCategorias()->getNomeCategoria();
			echo "<br>";
			echo " ---- Cliente: " . $Doc->getClientes()->getNome();
			echo "<br>";
			
			
			$objEnderecos = $Doc->getClientes()->getEnderecos();

			//echo $objEnderecos[0]->getLogradouro();

			var_dump($objEnderecos);
			//if($objEnderecos->count()){
				foreach($objEnderecos as $Endereco){
					echo  " --------- Endereco: " . $Endereco->getLogradouro();
					echo "<br>";
				}
			//}
			//print_r($Doc->getClientes()->getEnderecos()->getLogradouro());
			echo " <br><br>";
			
		}
		print "</pre>";

		
	});


Route::get('/clientes/docs/inserir', function()
{
	return View::make('clientes.inserirdocs');
});
