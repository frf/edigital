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

    <div class="jumbotron">

    <h3><b>Histórico do Chamado</b></h3>

        <!-- Tabela com informações sobre o chamado. -->
        <table class="table table-bordered table-condensed" style="width: 100%; background-color: #ffffff">
            <tr>
                <td class="col-lg-2" style="background-color: #F3F3F3"><b>Titulo</b></td>
                <td>{{ $chamado->titulo }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Categoria</b></td>
                <td>{{ CatChamado::find($chamado->categoria)->cat_chamado }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Status</b></td>
                <td>{{ StatusChamado::find($chamado->status)->status_chamado }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Data de Cadastro</b></td>
                <td>{{ $chamado->data }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Usuário</b></td>
                <td>{{ $chamado->usuario }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Mensagem</b></td>
                <td>{{ $chamado->mensagem }}</td>
            </tr>
        </table>

        <!-- Se existe alguma mensgem, a mesma deverá ser exibida aqui. -->
        @if($count != 0)
            <p><b>{{ "Mensagens:" }}</b></p>
            @foreach($mensagem as $aMensagem)
                <div style="border: 1px solid; border-radius: 5px; padding: 10px 10px 10px 10px; background-color: #ffffff">
                    <b>Usuário: </b>{{ $aMensagem->no_usuario }}<br />
                    <b>Data: </b>{{ $aMensagem->data }}<br />
                    <b>Status: </b>{{ StatusChamado::find($aMensagem->status)->status_chamado }}<br />
                    <b>Mensagem</b><br />
                    {{ $aMensagem->mensagem}}
                    <br />
                </div>
                <br />
            @endforeach
        @endif



        <!-- Formulário para a inserção de novas mensgens e alteração do status. -->
        <form method="post">
                <input type="hidden" name="no_usuario" value="{{ $usuario }}" />
                <input type="hidden" name="id_chamado" value="{{ $chamado->id }}" />

                <p><b>Nova mensagem:</b></p>
                <div style="border: 1px solid; border-radius: 5px">
                    <textarea style="width: 100%; height: 100px" name="mensagem"></textarea>
                </div>

                <br />

                <label for="opcao1">Selecione o status: </label>
                <select name="status" class="form-control" id="opcao1" style="width: 200px">
                    <option >Selecione...</option>
                    @foreach($sta as $oSta)
                        <option value="{{ $oSta->id }}"
                            @if($chamado->status == $oSta->id)
                                {{ "selected" }}
                            @endif
                        >{{ $oSta->status_chamado }}</option>
                    @endforeach
                </select>


                <br />

                <input type="submit" value="Salvar" class="btn btn-primary btn-sm" />
                <button type="button" class="btn btn-default btn-sm" onclick="history.go(-1)">Voltar</button>

        </form>
        <br />


    </div>
@stop









