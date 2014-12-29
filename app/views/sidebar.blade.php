@section('sidebar')
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
          <a class="navbar-brand" href="#">e-Online</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Principal</a></li>
            <li><a href="/docs">Meus Documentos</a></li>
            <li><a href="/atendimento">Atendimento</a></li>
            <li><a href="/cliente">Clientes</a></li>
            <li><a href="/newsletter">Newsletter</a></li>                
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
@stop