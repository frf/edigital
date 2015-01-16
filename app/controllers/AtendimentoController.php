<?php

class AtendimentoController extends BaseController {

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
        $header['nomeEmpresa'] = Config::get('edigital.nomeEmpresa');
        $header['nomeSistema'] = Config::get('edigital.nomeSistema');

        if(Auth::check()){
            $header['nomeUsuario'] = Auth::user()->nome;
        }

        $chamados = Chamado::orderBy('id', 'ASC')->paginate(15);

        return View::make('atendimento.index', compact('chamados', 'header'));
	}

    public function getCadastrar()
    {
        $cat_cha = CatChamado::get();
        $sta_cha = StatusChamado::get();
        $usuario    = Auth::user()->nome;

        return View::make('atendimento.cadastro', compact('cat_cha', 'sta_cha', 'usuario'));
    }

    public function postCadastrar()
    {
        $chamado = new Chamado();
        $chamado->categoria = Input::get('categoria');
        $chamado->titulo    = Input::get('titulo');
        $chamado->status    = Input::get('status');
        $chamado->idusuario   = Auth::user()->id;
        $chamado->mensagem  = Input::get('mensagem');
        $chamado->data      = date('d/m/Y H:i:s');
        $chamado->save();

        return Redirect::to('/atendimento');
    }

    public function getHistorico($id)
    {
        $chamado    = Chamado::find($id);
        $mensagem   = Mensagen::get();
        $sta        = StatusChamado::get();
        $count      = count($mensagem);
        $usuario    = Auth::user()->nome;

        return View::make('atendimento.historico', compact('chamado', 'sta', 'count', 'mensagem', 'usuario'));
    }

    public function postHistorico($id)
    {
        $mensagem   = new Mensagen();
        $mensagem->mensagem     = Input::get('mensagem');
        $mensagem->no_usuario   = Input::get('no_usuario');
        $mensagem->id_chamado   = Input::get('id_chamado');
        $mensagem->status       = Input::get('status');
        $mensagem->data         = date('d/m/Y H:i:s');
        $mensagem->save();

        $chamado = Chamado::find($id);
        $chamado->status = Input::get('status');
        $chamado->save();

        return Redirect::to('/atendimento/historico/'.$id);
    }
}



/*
 * insert into cat_chamados (cat_chamado,created_at,updated_at)
values ('Erro','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Correção','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Alteração','2015-01-16 12:00:00','2015-01-16 12:00:00');
 */









