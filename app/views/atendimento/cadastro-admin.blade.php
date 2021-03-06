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
        <h3><b>Cadastrar novo chamado</b></h3>
        <br />
        <div class="row">
            <div class="col-sm-12">
                <form method="post" id="cad_chamado">

                    <div class="form-group">
                        <label for="cat">*Categoria: </label>
                        <select class="form-control" id="cat" name="categoria">
                            <option value="">Selecione...</option>
                            @foreach($cat_cha as $aCat_cha)
                                <option value="{{ $aCat_cha->id }}">{{ $aCat_cha->cat_chamado }}</option>
                            @endforeach
                        </select>
                        <div id="categoria_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Selecione uma categoria.</i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="idcliente">*Cliente: </label>
                        <select class="form-control" id="idcliente" name="idcliente" required="true">
                            <option value="">Selecione...</option>
                            @foreach($aCliente as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>*Título: </label>
                        <input class="form-control" type="text" id="titulo" name="titulo" />
                        <div id="titulo_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Dê um título para o chamado.</i>
                        </div>
                    </div>
                    @if($produto->count())
                    <div class="form-group">
                        <label>*Produto: </label>
                        <select class="form-control" id="cat" name="categoria">
                            <option value="">Selecione...</option>
                            @foreach($produto as $oProd)
                                <option value="{{ $oProd->id }}">{{ $oProd->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>*Descrição: </label>
                        <textarea style="height: 200px" class="form-control" id="descricao" name="mensagem"></textarea>
                        <div id="descricao_cadastro" style="position: absolute; display: none">
                            <i style="color: red; font-size: 10px">Descreva o motivo do chamado.</i>
                        </div>
                    </div>

                    <div id="botao">
                        <input type="submit" value="Salvar" id="submit" class="btn btn-primary btn-sm" />
                        <button type="button" onclick="history.go(-1)" class="btn btn-default btn-sm">Voltar</button>
                    </div>
                </form>
            </div>
        </div>
@stop