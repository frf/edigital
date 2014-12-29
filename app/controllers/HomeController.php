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
    
       

       public function index()
	{
           
          $header['nomeEmpresa'] = "RBX Contabilidade";
          $header['nomeUsuario'] = "Fulano";
           
          return View::make('home',$header);
	}
	
	public function showSalvarPresente()
	{
            $method = Request::method();
            
            $produto = Input::get('produto');
            $idamigo = Input::get('idamigo');
              
            if (Request::isMethod('post'))
            {
              
              $oP = new Presente();
              $oP->setIdamigo($idamigo);
              $oP->setProduto($produto);
              $oP->save();
              
              return Redirect::to('/perfil/'.$idamigo);
            }
            
            return Redirect::to('/perfil/'.$idamigo);
	}
	public function showExcluirPresente($id)
	{
            if($id != ""){
                $oPresente = Base\PresenteQuery::create()->filterById($id)->findOne();
                $idUser = $oPresente->getIdamigo();
                $oPresente->delete();
                return Redirect::to('/perfil/'.$idUser);
            }else{
                return Redirect::to('/perfil/'.$idUser);
            }
	}

}
