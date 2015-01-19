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
        <h3><b>Cadastrar novo chamado</b></h3>
        <br />

        <form method="post">

            <table>
                <tr>
                    <td><label for="cat">*Categoria: </label></td>
                    <td><select class="form-control" id="cat" name="categoria">
                        <option value="">Selecione...</option>
                        @foreach($cat_cha as $aCat_cha)
                            <option value="{{ $aCat_cha->id }}">{{ $aCat_cha->cat_chamado }}</option>
                        @endforeach
                    </select></td>
                </tr>
                <tr>
                    <td><label for="status">*Status: </label></td>
                    <td><select class="form-control" id="status" name="status">
                        <option value="1">Aberto</option>
                    </select></td>
                </tr>
                <tr>
                    <td><label>*Título: </label></td>
                    <td><input class="form-control" type="text" name="titulo" /></td>
                </tr>
                <tr>
                    <td><label>*Descrição: </label></td>
                    <td><textarea class="form-control" name="mensagem"></textarea></td>
                </tr>
            </table>
            <br />
            <input type="submit" value="Salvar" class="btn btn-primary btn-sm" />
            <button type="button" onclick="history.go(-1)" class="btn btn-default btn-sm">Voltar</button>
        </form>
    </div>
@stop