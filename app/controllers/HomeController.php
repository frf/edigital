<?php

class HomeController extends BaseController {
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

        public function index() {

            $header['nomeEmpresa']  = Config::get('edigital.nomeSistema');   
            $header['chamados']     = array();
            $header['pgtos']        = array();
            
            
            if(Auth::check()){
                $header['nomeUsuario']  = Auth::user()->nome;
                
                if(Auth::user()->tipo == 'cliente'){
                    $oCliente = Clientes::where('id','=',Auth::user()->idcliente)->get();
                    $oDocumentos = Documentos::where('idcliente','=',Auth::user()->idcliente)->get();
                    $caminhoDoc = __DIR__.'/../storage/documento/';
                    
                    $header['nomeEmpresa']  = $oCliente->getNome();                    
                    $header['chamados']     = Chamado::orderBy('id', 'DESC')->paginate(3);
                    $header['pgtos']        = ClientePgtosQuery::create()->orderByIspaid()->limit(3)->orderByDtpagamento(Criteria::DESC)->find();
                    $header['oDocumentos']  = $oDocumentos;
                    
                    
                }
            }

            return View::make('home', $header);
        }

        public function getEntrar() {
            $titulo = 'Entrar - Desenvolvendo com Laravel';
            return View::make('home.entrar', compact('titulo'));
        }

        public function postEntrar() {
            // Opção de lembrar do usuário
            $remember = false;
            if (Input::get('remember')) {
                $remember = true;
            }

            // Autenticação
            if (Auth::attempt(array(
                        'email' => Input::get('email'),
                        'password' => Input::get('senha')
                            ), $remember)) {
                
                $oUsuario = Usuario::find(Auth::user()->id);
                
                if($oUsuario->isdelete){
                    return Redirect::to('entrar')
                                ->with('flash_error','Usuário desativado.');
                }
                
                return Redirect::to('/');
            } else {
                return Redirect::to('entrar')
                                ->with('flash_error','E-mail ou senha inválidos.');
            }
        }

        public function getSair() {
            Auth::logout();
            return Redirect::to('/');
        }

}
