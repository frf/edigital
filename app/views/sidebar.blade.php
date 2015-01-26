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
            <li @if(Request::segment(1) == "") class="active" @endif><a href="/">Principal</a></li>
                 @if(Auth::user()->tipo == 'admin')
                         @foreach(Config::get('edigital.menuAdmin') as $key => $menu)
                            <li @if(Request::segment(1) == $key) class="active" @endif><a @if($key == 'atendimento') class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#" @else href="/{{$key}}" @endif>{{ $menu }}</a></li>
                            @if($key == 'atendimento')
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="/atendimento">Chamado</a> </li>
                                    <li><a href="/atendimento/cat_chamado">Categoria</a> </li>
                                </ul>
                            @endif
                         @endforeach
                 @endif
                 @if(Auth::user()->tipo == 'cliente')
                     @foreach(Config::get('edigital.menuCliente') as $key => $menu);
                        <li @if(Request::segment(1) == $key) class="active" @endif><a @if($key == 'atendimento') class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#" @else href="/{{$key}}" @endif>{{ $menu }}</a></li>
                        @if($key == 'atendimento')
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/atendimento">Chamado</a> </li>
                                <li><a href="/atendimento/cat_chamado">Categoria</a> </li>
                            </ul>
                        @endif
                     @endforeach
                 @endif                       
           </ul>    

            <a href="{{ url('sair') }}" class="btn btn-danger navbar-btn navbar-right" style="margin-left: 10px">Sair</a> 
            <a href="/cliente/meus-dados" class="btn btn-success navbar-btn navbar-right">Meus Dados: {{ Auth::user()->nome }}</a>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
    
    
@else

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
        <a href="{{ url('entrar') }}" class="btn btn-success navbar-btn navbar-right">Entrar</a>
        <!--/.nav-collapse -->
      </div>
    </nav>


@endif
@stop