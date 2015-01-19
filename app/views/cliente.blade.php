@extends('layout')
@extends('sidebar')

@section('content')

<h3>Lista de Clientes</h3>

<a href="#" class="btn btn-primary btn-large"><i class="icon-white icon-plus"></i> Novo Cliente</a>


 @if(Session::has('message-sucess'))
    <div role="alert" class="alert alert-success">
       {{ Session::get('message-sucess') }}
    </div>
    @endif
    @if(Session::has('message-erro'))
    <div role="alert" class="alert alert-danger">
       {{ Session::get('message-erro') }}
    </div>
    @endif
    
<div class="table-responsive">
    
   
  <table class="table">
      <thead>
          <tr>
            <th>Nome</th>
            <th>Ferramentas</th>
          </tr>
        </thead>
        
        @foreach ($clientes as $cliente)
            <tr>
              <td scope="row">{{ $cliente->getNome() }}</td>
              <td>
                <a href="/cliente/editar/{{ $cliente->getId() }}" class="btn btn-xs btn-success">Editar</a>
                @if($cliente->getAtivo())
                    <a href="/cliente/desativar/{{ $cliente->getId() }}" class="btn btn-xs btn-warning">Desativar</a>
                @else 
                    <a href="/cliente/ativar/{{ $cliente->getId() }}" class="btn btn-xs btn-primary">Ativar</a>
                @endif
                <a href="/cliente/excluir/{{ $cliente->getId() }}" class="btn btn-xs btn-danger">Excluir</a>
              </td>
            </tr>
        @endforeach
  </table>
</div>

@stop