@extends('layout')
@extends('sidebar')

@section('content')

<h3>Novo Cliente</h3>
<div class="table-responsive">
    {{ Form::open() }}
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ Form::text('nome',null,array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ Form::text('email',null,array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Observação do contrato</th><td scope="row">{{ Form::textarea('obscontrato',null,array('class' => 'form-control')) }}</td>             
    </tr>
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/cliente' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop