<?php

class DocController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
       

       public function index()
	{
           
          $oClientes = ClienteQuery::create()->limit(5)->find();
           
          $dados['nomeEmpresa'] = "RBX Contabilidade";
          $dados['nomeUsuario'] = "Fulano";
          $dados['clientes'] = $oClientes;
          
          return View::make('cliente',$dados);
	}
	
	

}
