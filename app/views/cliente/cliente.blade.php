@extends('layout')
@extends('sidebar')

@section('content')

@if(Auth::user()->tipo == 'cliente')
<h3>Minhas Informações</h3>
@else
<h3>Lista de Clientes</h3>
@endif

@if(Auth::user()->tipo == 'admin')
    <a href="/cliente/novo" class="btn btn-primary btn-large"><i class="icon-white icon-plus"></i> Novo Cliente</a>
@endif

 @if(Session::has('message-sucess'))
    <br>
    <br>
    <div role="alert" class="alert alert-success">
       {{ Session::get('message-sucess') }}
    </div>
    @endif
    @if(Session::has('message-erro'))
    <br>
    <br>
    <div role="alert" class="alert alert-danger">
       {{ Session::get('message-erro') }}
    </div>
    @endif
    
<div class="table-responsive">
    
   
    <table class="table" id="no-more-tables">
      <thead>
          <tr>
            <th>Nome</th>
            <th>Ferramentas</th>
          </tr>
        </thead>
        
        @foreach ($clientes as $cliente)
            <tr>
              <td data-title="Nome" scope="row">{{ $cliente->getNome() }}</td>
              <td data-title="Ferramentas">
                <a href="/cliente/view/{{ $cliente->getId() }}" class="btn btn-xs btn-success">Visualizar</a>
                @if(Auth::user()->tipo == 'admin')
                    @if($cliente->getAtivo())
                        <a href="/cliente/desativar/{{ $cliente->getId() }}" class="btn btn-xs btn-warning">Desativar</a>
                    @else 
                        <a href="/cliente/ativar/{{ $cliente->getId() }}" class="btn btn-xs btn-primary">Ativar</a>
                    @endif
                    <a href="/cliente/excluir/{{ $cliente->getId() }}" class="btn btn-xs btn-danger">Excluir</a>
                @endif
              </td>
            </tr>
        @endforeach
  </table>
</div>

@stop