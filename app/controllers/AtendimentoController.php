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
        $chamados = Chamado::orderBy('id', 'ASC')->paginate(15);

        return View::make('atendimento.index', compact('chamados'));
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
        $chamado->email     = Auth::user()->email;
        $chamado->status    = Input::get('status');
        $chamado->usuario   = Auth::user()->id;
        $chamado->mensagem  = Input::get('mensagem');
        $chamado->data      = date('d/m/Y H:i:s');
        $chamado->save();

        return Redirect::to('/atendimento');
    }

    public function getHistorico($id)
    {
        $chamado    = Chamado::find($id);
        $mensagem   = Mensagen::where('id_chamado', $id )->paginate(3);
        $sta        = StatusChamado::orderBy('status_chamado','ASC')->get();
        $count      = count($mensagem);
        $usuario    = Auth::user()->nome;
        $tipo_user  = Auth::user()->tipo;
/*
        echo "<pre>";
        print_r($usuario);
        exit;
*/
        return View::make('atendimento.historico', compact('chamado', 'sta', 'count', 'mensagem', 'usuario', 'tipo_user'));
    }

    public function postHistorico($id)
    {
        $a = Input::get('avisar');
        if($a == "on"){
            Route::get('/teste-email', function()
            {
                Mail::send('emails.aviso', array('key' => 'value'), function($message)
                {
                    $message->to('fabio@fabiofarias.com.br', 'Cliente')->subject('Chamado');
                });
                return 'Hello World';
            });
        }


        $mensagem   = new Mensagen();
        $mensagem->mensagem     = Input::get('mensagem');
        $mensagem->no_usuario   = Input::get('no_usuario');
        $mensagem->id_chamado   = Input::get('id_chamado');
        $mensagem->data         = date('d/m/Y H:i:s');
        $mensagem->save();

        $chamado = Chamado::find($id);
        $chamado->status = Input::get('status');
        $chamado->save();

        return Redirect::to('/atendimento/historico/'.$id);
    }
}


//fabio@fabiofarias.com.br
/*
 * insert into cat_chamados (cat_chamado,created_at,updated_at)
values ('Erro','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Correção','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Alteração','2015-01-16 12:00:00','2015-01-16 12:00:00');
 */









