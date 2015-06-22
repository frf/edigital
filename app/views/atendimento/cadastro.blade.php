<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 16:43
 */ ?>


@extends('layout')
@extends('sidebar')

@section('content')

<script src="/js/atendimento.js"></script>

    <div style="float: left">
        <h3><b>Cadastrar novo chamado</b></h3>
        <br />

        <form method="post" id="cad_chamado">
            <table>
                <tr>
                    <td width="100">
                        <label for="cat">*Categoria: </label>
                    </td>
                    <td width="200">
                        <select class="form-control" id="cat" name="categoria">
                            <option value="">Selecione...</option>
                            @foreach($cat_cha as $aCat_cha)
                                <option value="{{ $aCat_cha->id }}">{{ $aCat_cha->cat_chamado }}</option>
                            @endforeach
                        </select>
                        <div id="categoria_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Selecione uma categoria.</i>
                        </div>
                    </td>
                    <td width="100" style="padding-left: 10px">
                        <label for="status">*Status: </label>
                    </td>
                    <td width="200">
                        <select class="form-control" id="status" name="status">
                            <option value="1">Aberto</option>
                        </select>
                    </td>
                </tr>
                <tr style="height: 76px">
                    <td><label>*Título: </label></td>
                    <td colspan="3">
                        <input class="form-control" type="text" id="titulo" name="titulo" />
                        <div id="titulo_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Dê um título para o chamado.</i>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                {{$produto->count()}}
                @if($produto->count()){
                <tr style="height: 76px">
                    <td><label>*Produto: </label></td>
                    <td colspan="3">
                        <select class="form-control" id="cat" name="categoria">
                            <option value="">Selecione...</option>
                            @foreach($produto as $oProd)
                                <option value="{{ $oProd->id }}">{{ $oProd->nome }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
                @endif
                <tr>
                    <td><label>*Descrição: </label></td>
                    <td colspan="3">
                        <textarea style="height: 200px" class="form-control" id="descricao" name="mensagem"></textarea>
                        <div id="descricao_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Descreva o motivo do chamado.</i>
                        </div>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
            </table>

            <br />
            <br />

            <div id="botao">
                <input type="submit" value="Salvar" id="submit" class="btn btn-primary btn-sm" />
                <button type="button" onclick="history.go(-1)" class="btn btn-default btn-sm">Voltar</button>
            </div>
        </form>
    </div>
@stop