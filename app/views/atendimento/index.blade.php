<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 16:42
 */ ?>

@extends('layout')
@extends('sidebar')

@section('content')

<script src="/js/atendimento.js"></script>
    <h3>Todos os Chamados</h3>
    
    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('success') }}
        </div>
    @endif

    @if(Session::has('warning'))
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{ Session::get('warning') }}
        </div>
    @endif
    <div class="table-responsive table-striped" id="no-more-tables">
        @if(Auth::user()->tipo == 'cliente')
        <a href="/atendimento/cadastrar" class="btn btn-primary margem">Novo Chamado</a>
        @endif
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
                            <button type="button" id="detalhar" onclick="info_atendimento({{ $chamado->id }})" class="btn btn-xs btn-success">Mensagem</button>
                        </td>
                    </tr>
                    <tr id="info{{ $chamado->id }}" style="display: none; background-color: #CBFFD5">
                        <td colspan="6">
                            <b>Mensagem: </b>{{ $chamado->mensagem }}
                        </td>
                    </tr>
                 @endforeach
            </tbody>
        </table>

    </div>

    {{ $chamados->links() }}
@stop