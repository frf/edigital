@extends('layout')
@extends('sidebar')

@section('content')

<h3>Informações do Cliente</h3>
<div class="table-responsive">
    {{ Form::open() }}
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ Form::text('nome',$cliente->getNome(),array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Login</th><td scope="row">{{ Form::text('login',$cliente->getLogin(),array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Senha</th><td scope="row">{{ Form::password('senha',array('placeholder' => '*********','class' => 'form-control')) }}</td>             
    </tr>
    
        
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/cliente' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop