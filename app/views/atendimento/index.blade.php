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


    <div style="padding-top: 30px; font-size: 13px">
        <h3><b>Todos os Chamados</b></h3>

        @if(Auth::user()->tipo == 'admin')
            <a href="/atendimento/cadastrar" class="btn btn-primary">Novo Chamado</a>

        @endif
        <br />
        <br />
        <table class="table table-bordered table-hover table-condensed"  style="background-color: #ffffff">
            <thead>
                <tr style="background-color: #B3B3B3">
                    <td width="60"><b>Id</b></td>
                    <td><b>Título</b></td>
                    <td class="col-lg-1"><b>Categoria</b></td>
                    <td><b>Status</b></td>
                    <td width="150"><b>Data de Cadastro</b></td>
                    <td width="97"><b>Ações</b></td>
                </tr>
            </thead>
            <tbody>
                 @foreach($chamados as $chamado)
                    <tr>
                        <td>{{ $chamado->id }}</td>
                        <td>{{ $chamado->titulo }}</td>
                        <td>{{ CatChamado::find($chamado->categoria)->cat_chamado }}</td>
                        <td class="col-lg-1">{{ StatusChamado::find($chamado->status)->status_chamado }}</td>
                        <td>{{ $chamado->data }}</td>
                        <td>
                            <a href="/atendimento/historico/{{ $chamado->id }}" class="btn btn-default btn-sm "><img width="20" src="/glyphicons-145-folder-open.png" /></a>
                            <button type="button" id="detalhar" onclick="info_atendimento({{ $chamado->id }})" class="btn btn-success btn-sm"><img width="18" src="/glyphicons-196-circle-info.png" /></button>
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