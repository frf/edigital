<?php

class ClienteController extends BaseController {

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

  $oClientes = ClientesQuery::create()->limit(5)->orderBy('nome')->find();

  $dados['nomeEmpresa'] = "RBX Contabilidade";
  $dados['nomeUsuario'] = "Fulano";
  $dados['clientes'] = $oClientes;

  return View::make('cliente',$dados);
}

public function editar($idGet)
{
  $method = Request::method();

  $id   = Input::get('id');
  $nome = Input::get('nome');
  $login = Input::get('login');
  $senha = Input::get('senha');

  $oCliente = ClienteQuery::create()->filterById($idGet)->findOne();     

  if(!$oCliente){
    return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
  }

  if (Request::isMethod('post'))
  {
    $oCliente->setNome($nome);
    $oCliente->setLogin($login);

    if($senha != ""){
      $oCliente->setLogin($senha);
    }
    $oCliente->save();

    return Redirect::to('/cliente')->with('message-sucess','Atualizado com sucesso!');
  }

  return View::make('cliente.editar',array('cliente'=>$oCliente));
}

public function excluir($idGet)
{
  $method = Request::method();

  $oCliente = ClienteQuery::create()->filterById($idGet)->findOne();     

  if(!$oCliente){
    return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
  }          

  $oCliente->delete();

  return Redirect::to('/cliente')->with('message-sucess','Cliente excluído com sucesso!');

}

public function desativar($idGet)
{
  $method = Request::method();

  $oCliente = ClienteQuery::create()->filterById($idGet)->findOne();     

  if(!$oCliente){
    return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
  }          

  $oCliente->setAtivo(false);
  $oCliente->save();

  return Redirect::to('/cliente')->with('message-sucess','Cliente desativado com sucesso!');

}

public function ativar($idGet)
{
  $method = Request::method();

  $oCliente = ClienteQuery::create()->filterById($idGet)->findOne();     

  if(!$oCliente){
    return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
  }          

  $oCliente->setAtivo(true);
  $oCliente->save();

  return Redirect::to('/cliente')->with('message-sucess','Cliente ativado com sucesso!');

}



}
