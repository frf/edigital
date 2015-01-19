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

Route::when('*', 'csrf', array('post'));
 
// Visitante
Route::get('/',
        array(
            'as' => 'home',
            'uses' => 'HomeController@index'
            )
        );
 
Route::get('entrar', 'HomeController@getEntrar');
Route::post('entrar', 'HomeController@postEntrar');
Route::get('sair', 'HomeController@getSair');
 
// Verifica se o usuário está logado
Route::group(array('before' => 'auth'), function()
{
    // Rota de artigos
    Route::controller('home', 'HomeController');
});

Route::get('/cliente', 'ClienteController@index');
Route::post('/cliente/editar/{id}', 'ClienteController@editar');
Route::get('/cliente/editar/{id}', 'ClienteController@editar');
Route::get('/cliente/desativar/{id}', 'ClienteController@desativar');
Route::get('/cliente/ativar/{id}', 'ClienteController@ativar');
Route::get('/cliente/excluir/{id}', 'ClienteController@excluir');


Route::get('/atendimento', 'ClienteController@index');
Route::get('/docs', 'ClienteController@index');
Route::get('/newsletter', 'ClienteController@index');


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
