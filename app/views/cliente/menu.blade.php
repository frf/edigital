<nav class="navbar navbar-default">
  <div class="container theme-showcase">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a  class="navbar-brand">Painel do Usuário</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li @if(Request::segment(2) == 'view') class="active" @endif ><a href="/cliente/view/{{ $id }}">Info</a></li>
        <li @if(Request::segment(2) == 'editar') class="active" @endif ><a href="/cliente/editar/{{ $id }}">Editar</a></li>
        <li @if(Request::segment(2) == 'listar-login') class="active" @endif ><a href="/cliente/listar-login/{{ $id }}">Listar Usuário</a></li>
        <li @if(Request::segment(2) == 'cadastrar-login') class="active" @endif ><a href="/cliente/cadastrar-login/{{ $id }}">Cadastrar Usuário</a></li>
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>