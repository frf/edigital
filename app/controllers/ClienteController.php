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

                $oClientes = Clientes::where('id','=',$id)->get();
          }else{                          
                #$oClientes = ClienteQuery::create()->limit(5)->orderBy('Nome')->find();

                $oClientes = Clientes::all();

          }

           
          $dados['nomeEmpresa'] = "RBX Contabilidade";
          $dados['nomeUsuario'] = "Fulano";
          $dados['clientes'] = $oClientes;
          
          return View::make('cliente.cliente',$dados);
	}
        public function dadosCliente($id){
            if($id == ""){
                $aCliente = array('erro'=>'Nenhum cliente encontrado!');
            }else{
                $oCliente = Clientes::find($id);
                if($oCliente){
                    var_dump(Produto::where('idcliente','=',$id)->all());

                    exit;

                    if(Produto::where('idcliente','=',$id)->all()){
                        $aCliente['produtos'] = $oCliente->getProdutoss()->toArray();
                    }
                }else{
                    $aCliente = array('erro'=>'Nenhum cliente encontrado!');
                }
            }
            
            return Illuminate\Support\Facades\Response::json($aCliente);
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
              $usuarios = Usuario::where('tipo','<>','admin')->where('idcliente','=',$id)->get();

              if(!$usuarios->count()){
                  return Redirect::to('/cliente/cadastrar-login/'.$id)->with('message-erro','Nenhum usuário encontrado!');
              }
              
          }

          $oCliente = Clientes::find($id);
                  
          return View::make('cliente.listar-login',array('usuarios'=>$usuarios,'id'=>$id,'oCliente'=>$oCliente));
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
           
          $oCliente = Clientes::find($id);
                    
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
          }
          
          return View::make('cliente.view',array('oCliente'=>$oCliente,'id'=>$id));
	}
        public function meusDados()
	{
          if(!Auth::check()){
              return Redirect::to('/cliente')->with('message-erro','Nenhum usuário encontrado!');
          }
           
          if (Request::isMethod('post'))
          {              
              $oLogin = Usuario::find(Auth::user()->id);
              
              if(Input::get('senha'))
              {
                    $oLogin->senha = Hash::make(Input::get('senha'));
              }
            
              $oLogin->nome = Input::get('nome');
              $oLogin->save(); 
              
              Session::flash('message-sucess', 'Usuário atualizado com sucesso.');
                   
          }
          
          $oCliente = UsuariosQuery::create()->filterById(Auth::user()->id)->findOne();     
                    
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum usuário encontrado!');
          }
          
          return View::make('cliente.meus-dados',array('cliente'=>$oCliente,
                                                       'id'=>Auth::user()->idcliente));
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
           
          $oCliente = Clientes::find(9);
          
          if(!$oCliente){
              return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
          }

          
          if($oCliente->getUsuarioss()){
                $loginCliente = "";
          }
          
          $loginCliente = "";
          
          if (Request::isMethod('post'))
          {
              $oCliente->nome = $nome;
              $oCliente->email = $email;
              
              if($senha != ""){
                $oCliente->login = $senha;
              }
              $oCliente->save();
        
              return Redirect::to('/cliente')->with('message-sucess','Atualizado com sucesso!');
          }
          
          return View::make('cliente.editar',array('oCliente'=>$oCliente,'loginCliente'=>$loginCliente,'id'=>$id));
          
	}
        public function novo()
	{
          $method = Request::method();
          
          $nome  = Input::get('nome');
          $email = Input::get('email');
          $obscontrato = Input::get('obscontrato');
           
          if (Request::isMethod('post'))
          {
              $oCliente = new Cliente();
              $oCliente->setNome($nome);
              $oCliente->setEmail($email);
              $oCliente->setObscontrato($obscontrato);
              $oCliente->setAtivo(true);
              $oCliente->save();
              
              
              
                $oCat =  new Categorias();
                $oCat->setIdCliente($oCliente->getId());
                $oCat->setNomecategoria("Suporte");
                $oCat->save();
                $oCat =  new Categorias();
                $oCat->setIdCliente($oCliente->getId());
                $oCat->setNomecategoria("Boleto");
                $oCat->save();
                $oCat =  new Categorias();
                $oCat->setIdCliente($oCliente->getId());
                $oCat->setNomecategoria("INSS");
                $oCat->save();
                $oCat =  new Categorias();
                $oCat->setIdCliente($oCliente->getId());
                $oCat->setNomecategoria("IRPF");
                $oCat->save();
                $oCat =  new Categorias();
                $oCat->setIdCliente($oCliente->getId());
                $oCat->setNomecategoria("Tabelas");
                $oCat->save();
        
              return Redirect::to('/cliente')->with('message-sucess','Cadastrado com sucesso!');
          }
          
          return View::make('cliente.novo');
          
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
              }else{
                  Session::flash('message-erro', 'Erro senha não preenchida.');
                  return View::make('cliente.cadastrar-login',array('oCliente'=>$oCliente,'id'=>$id,'email'=>Input::get('email')));
              }
            
              $oLogin->nome      = Input::get('nome');
              $oLogin->email     = Input::get('email');
              $oLogin->tipo      = 'cliente';
              
              if(Input::get('lang')){
                  $oLogin->lang      = Input::get('lang');
              }else{
                  $oLogin->lang      = 'pt';
              }
              
              $oLogin->idcliente = $id;
              
              $oCliente = UsuariosQuery::create()
                  ->filterByEmail(Input::get('email'))
                  ->findOne();
              
              if(!$oCliente){
                    $oLogin->save();                
                    return Redirect::to('/cliente/listar-login/'.$id)->with('message-sucess','Cadastrado com sucesso!');
              }else{
                  Session::flash('message-erro', 'Erro email ja á cadastrado.');
              }
          }
          
          return View::make('cliente.cadastrar-login',array('oCliente'=>$oCliente,'id'=>$id,'email'=>Input::get('email')));
          
	}
        
        public function excluir($idGet)
	{
            $method = Request::method();
           
            $oCliente = Clientes::find($idGet);
           
            if(!$oCliente){
                return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
            }


            if(count($oCliente->getDocumentoss()->get())){
                $caminhoDoc = __DIR__.'/../storage/documento/';

                foreach ($oCliente->getDocumentoss()->get() as $oDoc){
                    @unlink($caminhoDoc.$oDoc->caminhodoc);

                    if(count($oDoc->getDocumentosDownloadss())){
                        $oDoc->getDocumentosDownloadss()->delete();
                    }

                    $oDoc->delete();
                }
            }

            if(count($oCliente->getCategoriass()->get())){
                $oCliente->getCategoriass()->delete();
            }
            if(count($oCliente->getClientePgtoss()->get())){
                $oCliente->getClientePgtoss()->delete();
            }

            if(count($oCliente->getProdutoss()->get())){
                $oCliente->getProdutoss()->delete();
            }

            if(count($oCliente->getUsuarioss()->get())){
                $oCliente->getUsuarioss()->delete();
            }

            $oCliente->delete();
            
            return Redirect::to('/cliente')->with('message-sucess','Cliente excluído com sucesso!');
          
	}
        public function excluirLogin($id,$idCli)
	{
            $method = Request::method();
           
            $oCliente = UsuariosQuery::create()->filterById($id)->filterByIdcliente($idCli)->findOne();     
           
            if(!$oCliente){
                return Redirect::to('/cliente')->with('message-erro','Usuário não encontrado!');
            }          
          
            $oCliente->setIsdelete(true);
            $oCliente->save();
            
            return Redirect::to('/cliente/listar-login/'.$idCli)->with('message-sucess','Usuário excluído com sucesso!');
          
	}
        public function desativar($idGet)
	{
            $method = Request::method();
           
            $oCliente = Clientes::find($idGet);
           
            if(!$oCliente){
                return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
            }          
          
            $oCliente->ativo = false;
            $oCliente->save();
            
            return Redirect::to('/cliente')->with('message-sucess','Cliente desativado com sucesso!');
          
	}
        public function ativar($idGet)
	{
            $method = Request::method();

            $oCliente = Clientes::find($idGet);

            if(!$oCliente){
                return Redirect::to('/cliente')->with('message-erro','Nenhum cliente encontrado!');
            }

            $oCliente->ativo = true;
            $oCliente->save();
            
            return Redirect::to('/cliente')->with('message-sucess','Cliente ativado com sucesso!');
          
	}
	

}
