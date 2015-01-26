<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 21/01/15
 * Time: 14:07
 */ ?>

@extends('layout')
@extends('sidebar')

@section('content')

    <h3>Editar categoria</h3>

    <script src="/js/atendimento.js"></script>

    <form method="post" id="form_edit_cat">
        <input type="hidden" name="id" value="{{ $edi_cat_chamado->id }}">
        <table>
            <tr>
                <td>
                    <input class="form-control" type="text" id="edi_cat" name="edi_cat" value="{{ $edi_cat_chamado->cat_chamado }}">
                    <div id="no_cat" style="position: absolute; display: none">
                        <i style="color: red; font-size: 10px">Esse campo não pode ser vazio.</i>
                    </div>
                </td>
                <td style="padding-left: 10px"><input id="cat_editar" type="submit" value="Salvar" class="btn btn-sm btn-primary"></td>
                <td style="padding-left: 10px"><button type="button" onclick="history.go(-1)" class="btn btn-sm btn-default">Voltar</button></td>
            </tr>
        </table>
    </form>
    <br />
    <table class="table table-bordered table-hover">
        <thead>
            <tr style="background-color: #E3E1E2">
                <td width="500">Nome</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $aCategoria)
                <tr>
                    <td>{{ $aCategoria->cat_chamado }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categoria->links() }}

@stop











