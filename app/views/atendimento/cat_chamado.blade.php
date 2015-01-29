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

    <h3>Cadastrar nova categoria</h3>

    <script src="/js/atendimento.js"></script>

    <form method="post" id="form_cat">
        <table>
            <tr>
                <td><input class="form-control" type="text" name="nova_cat" placeholder="Nova categoria." /></td>
                <td style="padding-left: 10px"><input type="submit" value="Salvar" id="sav_cat" class="btn btn-sm btn-primary"></td>


            </tr>
        </table>
    </form>
    <div id="no_cat" style="position: absolute; display: none">
        <i style="color: red; font-size: 10px">Informe o nome da categoria.</i>
    </div>
    <br />
    <table class="table table-bordered table-hover table-condensed">
        <thead>
            <tr style="background-color: #E3E1E2">
                <td>Nome</td>
                <td>Ações</td>
            </tr>
        </thead>
        <tbody>
            @foreach($categoria as $aCategoria)
                <tr>
                    <td>{{ $aCategoria->cat_chamado }}</td>
                    <td width="80">
                        <a href="/atendimento/edi_cat_chamado/{{ $aCategoria->id }}" class="btn btn-default btn-sm">
                            <i><img width="10" src="/glyphicons-31-pencil.png" /> </i>
                        </a>
                        <a href="/atendimento/del_cat_chamado/{{ $aCategoria->id }}" class="btn btn-danger btn-sm">
                            <i><img width="10" src="/glyphicons-17-bin.png" /> </i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categoria->links() }}

@stop











