@extends('layout')
@extends('sidebar')

@section('content')

@if(Auth::user()->tipo == 'cliente')
<h3>Financeiro</h3>
@else
<h3>Lista Faturas dos Clientes</h3>
@endif

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

    @if(Auth::user()->tipo == 'admin')
        <a href="/financeiro/novo-lancamento" class="btn btn-primary btn-large"><i class="icon-white icon-plus"></i> Novo Lançamento</a>
    @endif

    <div class="table-responsive table-striped" id="no-more-tables">
  <table class="table">
      <thead>
          <tr>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Cliente</th>
            <th>Dt Pgto</th>
            <th>Ferramentas</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($pgtos as $pgto)
            <tr>
              @if($pgto->getIdproduto())
                <td data-title="Descrição" scope="row">{{ $pgto->getProdutos()->getNome() }}</td>
              @else
                <td data-title="Descrição" scope="row">{{ $pgto->getDescricao() }}</td>
              @endif
              <td data-title="Valor"  class="numeric" scope="row">{{ $pgto->getMoeda()->getSimbolo() }} {{ $pgto->getValor() }}</td>
              <td data-title="Nome Cliente" scope="row">{{ $pgto->getCliente()->getNome() }}</td>
              <td data-title="Dt Pgto" scope="row">{{ $pgto->getDtpagamento('d/m/Y H:i') }}</td>
              <td data-title="Ferramenta" scope="row">
                    @if($pgto->getIsPaid())
                        <a href="/financeiro/pendente/{{ $pgto->getId() }}" class="btn btn-xs btn-success">Pago</a>
                    @else 
                        <a href="/financeiro/pago/{{ $pgto->getId() }}" class="btn btn-xs btn-warning">Pendente</a>
                    @endif
                    
                    <a href="/financeiro/excluir-lancamento/{{ $pgto->getId() }}" class="btn btn-xs btn-danger">Excluir</a>
              </td>              
            </tr>
        @endforeach
        </tbody>
  </table>
</div>

@stop