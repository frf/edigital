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
        
        
       
        $chamados = Chamado::orderBy('id', 'DESC')->paginate(10);
        $tipo_usuario = Auth::user()->tipo;

        return View::make('atendimento.index', compact('chamados', 'tipo_usuario', 'categoria'));
	}
    public function getCadastrarAdmin()
    {
        if(Auth::user()->tipo == 'admin') {

            $cat_cha = CatChamado::orderBy('cat_chamado', 'ASC')->paginate(10);
            $sta_cha = StatusChamado::get();

            $aCliente = \Clientes::get();

            $produto = Produto::where('idcliente', '=', Auth::user()->idcliente)
                ->whereNull('idpai')
                ->get();
            $usuario = Auth::user()->nome;

            return View::make('atendimento.cadastro-admin', compact('cat_cha', 'sta_cha', 'usuario', 'produto','aCliente'));

        }else{
            return Redirect::to('/atendimento')->with('warning', "<strong>Erro!</strong> Você não é administrador.");
        }
    }
    public function postCadastrarAdmin()
    {
        try{

            if(Auth::user()->tipo == 'admin') {
                $chamado = new Chamado();
                $chamado->categoria = Input::get('categoria');
                $chamado->titulo = Input::get('titulo');
                $chamado->status = 1;
                $chamado->idcliente = Input::get('idcliente');
                $chamado->idusuario = Auth::user()->id;
                $chamado->mensagem = Input::get('mensagem');
                $chamado->data = date('d/m/Y H:i:s');
                $chamado->save();

                $lastId = str_pad($chamado->id, 10, "0", STR_PAD_LEFT);;

                //$data = array('nome' => "Administrador");

                //Mail::send('emails.cadastrochamado', $data, function ($message) use ($lastId) {
                //    $message->to(Config::get('edigital.emailCliente'), 'Administrador Sistema')->subject('Chamado Aberto - Número: ' . $lastId);
                //});

                return Redirect::to('/atendimento')->with('success', "<strong>Sucesso!</strong> Chamado cadastrado.");
            }else{
                return Redirect::to('/atendimento')->with('warning', "<strong>Erro!</strong> Você não é administrador.");
            }
        }catch (Exception $e){

            return Redirect::to('/atendimento')->with('warning',"<strong>Atenção!</strong> O Chamado não foi cadastrado." . $e->getMessage());
        }
    }
    public function getCadastrar()
    {
        $cat_cha = CatChamado::orderBy('cat_chamado', 'ASC')->paginate(10);
        $sta_cha = StatusChamado::get();

        $produto = Produto::where('idcliente','=',Auth::user()->idcliente)
            ->whereNull('idpai')
            ->get();
        $usuario    = Auth::user()->nome;

        return View::make('atendimento.cadastro', compact('cat_cha', 'sta_cha', 'usuario','produto'));
    }

    public function postCadastrar()
    {
        try{
            $chamado = new Chamado();
            $chamado->categoria = Input::get('categoria');
            $chamado->titulo = Input::get('titulo');
            $chamado->status = 1;
            $chamado->idcliente = Auth::user()->idcliente;
            $chamado->idusuario = Auth::user()->id;
            $chamado->mensagem = Input::get('mensagem');
            $chamado->data = date('d/m/Y H:i:s');
            $chamado->save();

            $lastId = str_pad($chamado->id, 10, "0", STR_PAD_LEFT);;
            
            $data = array( 'nome' => "Administrador");
            
            Mail::send('emails.cadastrochamado', $data, function($message) use ($lastId)
            {
                $message->to(Config::get('edigital.emailAdministrador'), 'Administrador Sistema')->subject('Chamado Aberto - Número: ' . $lastId);
            });
            
            return Redirect::to('/atendimento')->with('success',"<strong>Sucesso!</strong> Chamado cadastrado.");
        }catch (Exception $e){

            return Redirect::to('/atendimento')->with('warning',"<strong>Atenção!</strong> O Chamado não foi cadastrado." . $e->getMessage());
        }
    }

    public function getCatChamado()
    {
        $categoria = CatChamado::orderBy('cat_chamado', 'ASC')->paginate(10);

        return View::make('atendimento.cat_chamado', compact('categoria'));
    }

    public function postCatChamado()
    {
        try{
            $categoria              = new CatChamado();
            $categoria->cat_chamado = Input::get('nova_cat');
            $categoria->save();

            return Redirect::to('/atendimento/cat_chamado')->with('success',"Sucesso ao cadastrar a categoria.");
        }catch (Exception $e){

            return Redirect::to('/atendimento/cat_chamado')->with('success', $e);
        }
    }

    public function getEdiCatChamado($id)
    {
        $edi_cat_chamado = CatChamado::find($id);
        $categoria = CatChamado::orderBy('cat_chamado', 'ASC')->paginate(10);

        return View::make('atendimento.edi_cat_chamado', compact('edi_cat_chamado', 'categoria'));
    }

    public function postEdiCatChamado()
    {
        try{
            $edi_cat_chamado = CatChamado::find(Input::get('id'));
            $edi_cat_chamado->cat_chamado = Input::get('edi_cat');
            $edi_cat_chamado->save();

            return Redirect::to('/atendimento/cat_chamado')->with('success',"Sucesso ao editar a categoria.");
        }catch(Exception $e){

            return Redirect::to('/atendimento/cat_chamado')->with('warning', $e);
        }
    }

    public function getDelCatChamado($id)
    {
        try{
            $del_cat_chamado = CatChamado::find($id);
            $del_cat_chamado->delete();

            return Redirect::to('/atendimento/cat_chamado')->with('success',"Sucesso ao excluir a categoria.");
        }catch(Exception $e){

            return Redirect::to('/atendimento/cat_chamado')->with('warning', $e);
        }
    }

    public function getHistorico($id)
    {
        $chamado    = Chamado::find($id);
        $mensagem   = Mensagen::where('id_chamado', $id )->paginate(3);
        $sta        = StatusChamado::orderBy('status_chamado','ASC')->get();
        $count      = count($mensagem);
        $usuario    = Auth::user()->nome;
        $tipo_user  = Auth::user()->tipo;

        return View::make('atendimento.historico', compact('chamado', 'sta', 'count', 'mensagem', 'usuario', 'tipo_user'));
    }

    public function postHistorico($id)
    {
        try{
            $a = Input::get('avisar');
            if(!empty($a)){
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
            $mensagem->idusuario   = Auth::user()->id;
            $mensagem->id_chamado   = Input::get('id_chamado');
            $mensagem->data         = date('d/m/Y H:i:s');
            $mensagem->save();

            $chamado = Chamado::find($id);
            $chamado->status = Input::get('status');
            $chamado->save();

            if($chamado->status == 'Fechado'){
                return Redirect::to('/atendimento/historico/'.$id)->with('success', "Sucesso ao fechar o chamado.");
            }else{
                return Redirect::to('/atendimento/historico/'.$id)->with('success', "Sucesso ao enviar a mensagem.");
            }
        }catch (Exception $e){

            return Redirect::to('/atendimento/historico/'.$id)->with('warning', $e);
        }
    }
}


//fabio@fabiofarias.com.br
/*
 * insert into cat_chamados (cat_chamado,created_at,updated_at)
values ('Erro','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Correção','2015-01-16 12:00:00','2015-01-16 12:00:00'),
('Alteração','2015-01-16 12:00:00','2015-01-16 12:00:00');
 */









