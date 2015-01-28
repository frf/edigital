<?php

class FinanceiroController extends BaseController {

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
      
          $dados['pgtos'] = ClientePgtosQuery::create()->find();
          
          
          return View::make('financeiro.index',$dados);
	}
       public function novoLancamento()
	{
            $clientes = Base\ClienteQuery::create()->find();
        
            $aCliente = array('0'=>'Escolha um Cliente');
        
            foreach($clientes as $cliente){
                $aCliente[$cliente->getId()] = $cliente->getNome();
            }
        
            return View::make('financeiro.novo-lancamento',array('clientes'=> $aCliente));
        }
       public function salvarLancamento()
	{
           $dados = Input::all();
           $file = Input::file('nota');
           
           if($dados['valor'] != "" && $dados['idcliente'] != ""){
           
               if(Input::hasFile('nota')){
                    $fileNome = $dados['idcliente']. "_" .md5($file->getClientOriginalName() . date('Ymd'));
               }
               
               $pgto = new ClientePgtos();
               
               if($dados['idproduto'] != ""){
                   $pgto->setIdproduto($dados['idproduto']);
               }
               $pgto->setIdcliente($dados['idcliente']);
               $pgto->setDescricao($dados['descricao']);
               $pgto->setValor($dados['valor']);
               $pgto->setIspaid($dados['ispaid']);
               $pgto->setIdmoeda(Config::get('edigital.moeda'));
               
               if(Input::hasFile('nota')){
                   $pgto->setNota($fileNome);
                   $file->move(__DIR__.'/../storage/nota/',$fileNome);               
               }
               
               $pgto->save();
               return Redirect::to('/financeiro')->with('message-sucess','Cadastrado com sucesso!');
                       
           }else{
               return Redirect::to('/financeiro/novo-lancamento')->with('message-erro','Lançamento não cadastrado!');
           }
          
           
           
           
        }
}
