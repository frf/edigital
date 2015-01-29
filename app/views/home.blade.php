@extends('layout')
@extends('sidebar')

@section('content')

    <div class="jumbotron">
        <h2>{{$nomeEmpresa}}</h2>
        @if(Auth::check())
            <p>Bem vindo {{ $nomeUsuario }}.</p>
        @endif
    </div>
    @if(Auth::check()){
    @if(Auth::user()->tipo == 'cliente')
    <div style="padding-top: 30px; font-size: 13px">
        <h4><b>Atendimentos</b></h4>

        <table class="table" id="no-more-tables">
            <thead>
                <thead>
                    <tr>
                        <td><b>Id</b></td>
                        <td><b>Título</b></td>
                        <td><b>Categoria</b></td>
                        <td><b>Status</b></td>
                        <td><b>Data de Cadastro</b></td>
                        <td><b>Ferramentas</b></td>
                    </tr>
                </thead>
            </thead>
            <tbody>
                 @foreach($chamados as $chamado)
                    <tr>
                        <td data-title="Id" scope="row">{{ $chamado->id }}</td>
                        <td data-title="Titulo" scope="row">{{ $chamado->titulo }}</td>
                        <td data-title="Categoria" scope="row">{{ CatChamado::find($chamado->categoria)->cat_chamado }}</td>
                        <td data-title="Status" scope="row">{{ StatusChamado::find($chamado->status)->status_chamado }}</td>
                        <td data-title="Data" scope="row">{{ $chamado->data }}</td>
                        <td data-title="Ferramentas" scope="row">
                            <a href="/atendimento/historico/{{ $chamado->id }}" class="btn btn-xs btn-primary">Histórico</a>                            
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
    <div class="table-responsive table-striped" id="no-more-tables">
        <h4><b>Financeiro</b></h4>
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
                            <a href="#" class="btn btn-xs btn-success">Pago</a>
                        @else 
                            <a href="#" class="btn btn-xs btn-warning">Pendente</a>
                        @endif
                  </td>              
                </tr>
            @endforeach
            </tbody>
      </table>
    </div>
    @endif
    @endif
@stop

