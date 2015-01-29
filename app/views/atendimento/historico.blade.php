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

    <div>

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
            
                <td>{{ $chamado->usuario->nome }}</td>
            </tr>
            <tr>
                <td style="background-color: #F3F3F3"><b>Mensagem</b></td>
                <td>{{ $chamado->mensagem }}</td>
            </tr>
        </table>

        <!-- Se existe alguma mensgem, a mesma deverá ser exibida aqui. -->
        @if($count != 0)
            <p>
                <b>{{ "Mensagens:" }}</b></p>
            @foreach($mensagem as $aMensagem)
                <div style="border: 1px solid; border-radius: 5px; padding: 10px 10px 10px 10px; background-color: #ffffff">
                    <b>Usuário: </b>{{ $aMensagem->usuario->nome }}<br />
                    <b>Data: </b>{{ $aMensagem->data }}<br />
                    <b>Mensagem</b><br />
                    {{ $aMensagem->mensagem}}
                    <br />
                </div>
                <br />
            @endforeach
        @endif

        {{ $mensagem->links() }}


        <!-- Formulário para a inserção de novas mensgens e alteração do status. -->
        @if($chamado->status != 3)
            <form method="post" id="form_his">
                <input type="hidden" name="id_chamado" value="{{ $chamado->id }}" />
               
                <p><b>Nova mensagem:</b></p>
                <div style="border: 1px solid; border-radius: 5px">
                    <textarea style="width: 100%; height: 100px" name="mensagem" id="mensagem"></textarea>
                    <div id="mensagem_his" style="position: absolute; display: none">
                        <i style="color: red; font-size: 10px">Escreva uma mensagem.</i>
                    </div>
                </div>

                <br />
                @if($tipo_user == 'admin')
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
                @else
                    <select name="status" class="form-control" id="opcao1" style="width: 200px" >
                        <option value="{{ $chamado->status }}">{{ StatusChamado::find($chamado->status)->status_chamado }}</option>
                    </select>
                @endif

                <br />
                    <label> Responder e avisar.</label>
                    <input type="checkbox" name="avisar" />
                <br />

                <div id="salvar_his" style="width: 65px; float: left">
                    <input type="submit" value="Salvar" id="salvar" class="btn btn-success btn-sm" />
                </div>
                    <a href="/atendimento" class="btn btn-info btn-sm" >Voltar</a>
            </form>
        @endif

        @if($chamado->status == 3)
                <a href="/atendimento" class="btn btn-info btn-sm">Voltar</a>
            <br />
        @endif

        <br />


    </div>
@stop









