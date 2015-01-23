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

<div class="table-responsive">
  <table class="table">
      <thead>
          <tr>
            <th>Descrição</th>
            <th>Valor</th>
            <th>Ferramentas</th>
          </tr>
        </thead>
        
        @foreach ($pgtos as $pgto)
            <tr>
              @if($pgto->getIdproduto())
                <td scope="row">{{ $pgto->getProdutos()->getNome() }}</td>
              @else
                <td scope="row">{{ $pgto->getDescricao() }}</td>
              @endif
              <td scope="row">{{ $pgto->getMoeda()->getSimbolo() }} {{ $pgto->getValor() }}</td>
              <td scope="row">-</td>              
            </tr>
        @endforeach
  </table>
</div>

@stop