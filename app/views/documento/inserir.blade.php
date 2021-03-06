@extends('layout')
@extends('sidebar')

@section('content')

@extends('cliente.menu')
@if(Session::has('message-sucess'))
    <div role="alert" class="alert alert-success">
       {{ Session::get('message-sucess') }}
    </div>
    @endif
    @if(Session::has('message-erro'))
    <div role="alert" class="alert alert-danger">
       {{ Session::get('message-erro') }}
    </div>
    @endif
{{ Form::open(array('url' => '/documento/save', 'class' => 'form-horizontal', 
    'enctype'=>'multipart/form-data',
'role' => 'form')) }}

<input type="hidden" name="idCliente" value="{{ $id }}">

<hr>

<div class="form-group">
    <label for="nome" class="col-lg-2 control-label">Nome do Documento</label>
    <div class="col-lg-6">
        {{ Form::text('nome', "", array('class' => 'form-control', 'placeholder' => 'Digite o nome do documento')) }}
    </div>
</div>

<div class="form-group">
    <label for="descricao" class="col-lg-2 control-label">Descrição</label>
    <div class="col-lg-6">
        {{ Form::text('descricao', "", array('class' => 'form-control', 'placeholder' => 'Digite a descrição documento')) }}
    </div>
</div>


<div class="form-group">
    <label for="categoria" class="col-lg-2 control-label">Categoria</label>
    <div class="col-lg-6">
        {{ Form::select('idcategoria', $aCat, "idcategoria", array('class' => 'form-control')) }}
    </div>
</div>

<div class="form-group">
    <label for="arquivo" class="col-lg-2 control-label">Selecione o arquivo</label>
    <div class="col-lg-6">
        {{ Form::file('arquivo') }}
    </div>
</div>

<div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
        {{ Form::submit('Salvar', array('class' => 'btn btn-primary')) }}
        <a href="{{ url('/documento/listar/')."/".$id }}" title="Cancelar" class="btn btn-default">Cancelar</a>
    </div>
</div>

{{ Form::close() }}

@stop
