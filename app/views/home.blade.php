@extends('layout')
@extends('sidebar')

@section('content')

    <div class="jumbotron">
        <h2>{{$nomeEmpresa}}</h2>
        <p>Bem vindo {{ $nomeUsuario }}.</p>
    </div>
@stop