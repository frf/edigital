@extends('layout')
@extends('sidebar')

@section('content')

    <div class="jumbotron">
        <h2>{{$nomeEmpresa}}</h2>
        @if(Auth::check())
            <p>Bem vindo {{ $nomeUsuario }}.</p>
        @endif
    </div>
@stop

