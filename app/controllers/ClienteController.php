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
           /*
           * Caso seja cliente apenas exibir os login do cliente pelo id authenticado
           * Caso seja admin exibir atraves do get id do cliente
           */ 
          if(Auth::user()->tipo == 'cliente'){
                $id   = Auth::user()->idcliente;
                
                $oClientes = ClienteQuery::create()->limit(5)->filterById($id)->orderBy('Nome')->find(); 
          }else{                          
                $oClientes = ClienteQuery::create()->limit(5)->orderBy('Nome')->find();
          }
           
          
           
          $dados['nomeEmpresa'] = "RBX Contabilidade";
          $dados['nomeUsuario'] = "Fulano";
          $dados['clientes'] = $oClientes;
          
          return View::make('cliente',$dados);
	}
       public function listarLogin($id)
	{
          /*
           * Caso seja cliente apenas exibir os login do cliente pelo id authenticado
           * Caso seja admin exibir atraves do get id do cliente
           */ 
          if(Auth::user()->tipo == 'cliente'){
               $id   = Auth::user()->idcliente;
               $usuarios = Usuario::where('idcliente', '=', $id)->get();
          }else{               
               $usuarios = Usuario::all();
          }

          return View::make('cliente.listar-login',array('usuarios'=>$usuarios,'id'=>$id));
	}
        public function view($id)
	{
          $method = Request::method();
            
          /*
           * Caso seja cliente apenas exibir os login do cliente pelo id authenticado
           * Caso seja admin exibir atraves do get id do cliente
           */ 
          if(Auth::user()->tipo == 'cliente'){
               $id   = Auth::user()->idcliente;
               $usuarios = Usuario::where('idcliente', '=', $id)->get();
          }else{               
               $usuarios = Usuario::all();
          }
          
          $nome = Input::get('nome');
          $email = Input::get('email');
          $senha = Input::get('senha');
           
          $oCliente = ClienteQuery::create()->filterById($id)->findOne();     
                    
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
          }
          
          
          return View::make('cliente.view',array('cliente'=>$oCliente,'id'=>$id));
	}
        public function editar($id)
	{
          $method = Request::method();
            
          /*
           * Caso seja cliente apenas exibir os login do cliente pelo id authenticado
           * Caso seja admin exibir atraves do get id do cliente
           */ 
          if(Auth::user()->tipo == 'cliente'){
               $id   = Auth::user()->idcliente;
               $usuarios = Usuario::where('idcliente', '=', $id)->get();
          }else{               
               $usuarios = Usuario::all();
          }
          
          $nome  = Input::get('nome');
          $email = Input::get('email');
          $senha = Input::get('senha');
           
          $oCliente = ClienteQuery::create()->filterById($id)->findOne();     
          
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
          }
          
          if($oCliente->getUsuarioss()->count()){                
                $loginCliente = "";
          }
          
          $loginCliente = "";
          
          if (Request::isMethod('post'))
          {
              $oCliente->setNome($nome);
              $oCliente->setEmail($email);
              
              if($senha != ""){
                $oCliente->setLogin($senha);
              }
              $oCliente->save();
        
              return Redirect::to('/cliente')->with('message-sucess','Atualizado com sucesso!');
          }
          
          return View::make('cliente.editar',array('cliente'=>$oCliente,'loginCliente'=>$loginCliente,'id'=>$id));
          
	}
        public function cadastrarLogin($id)
	{
          $method = Request::method();
            
          /*
           * Caso seja cliente apenas exibir os login do cliente pelo id authenticado
           * Caso seja admin exibir atraves do get id do cliente
           */ 
          if(Auth::user()->tipo == 'cliente'){
               $id   = Auth::user()->idcliente;
               $usuarios = Usuario::where('idcliente', '=', $id)->get();
          }else{                          
              $usuarios = Usuario::all();
          }
          /*
           * Pegar dados do cliente
           */
          $oCliente = ClienteQuery::create()
                  ->filterById($id)
                  ->findOne();
          
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
          }
          
          if (Request::isMethod('post'))
          {
              $oLogin =  new Usuario();
              
              if(Input::get('senha'))
              {
                    $oLogin->senha = Hash::make(Input::get('senha'));
              }
              
              $oLogin->nome      = $oCliente->getNome();
              $oLogin->email     = Input::get('email');
              $oLogin->tipo      = 'cliente';
              $oLogin->idcliente = $id;
              
              $oLogin->save();
        
              return Redirect::to('/cliente/listar-login/'.$id)->with('message-sucess','Cadastrado com sucesso!');
          }
          
          return View::make('cliente.cadastrar-login',array('cliente'=>$oCliente,'id'=>$id));
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
