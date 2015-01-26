@section('sidebar')

@if(Auth::check())

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">e-Online</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Principal</a></li>
            <li><a href="/docs">Meus Documentos</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    Atendimento <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="/atendimento">Chamado</a> </li>
                    <li><a href="/atendimento/cat_chamado">Categoria</a> </li>
                </ul>
            </li>
            <li><a href="/cliente">Clientes</a></li>
            <li><a href="/newsletter">Newsletter</a></li>                
          </ul>
            <a href="{{ url('sair') }}" class="btn btn-danger navbar-btn navbar-right">Sair</a>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    
@else

    <!-- Fixed navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <a href="{{ url('entrar') }}" class="btn btn-success navbar-btn navbar-right">Entrar</a>
        <!--/.nav-collapse -->
      </div>
    </nav>


@endif
@stop