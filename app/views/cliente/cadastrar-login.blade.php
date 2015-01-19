@extends('layout')
@extends('sidebar')

@section('content')

<h3>Login do Cliente</h3>

@extends('cliente.menu')


<div class="table-responsive">
    {{ Form::open() }}
    {{ Form::hidden('id',$id,array('class' => 'form-control')) }}
    
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ $cliente->getNome() }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ Form::text('email',null,array('class' => 'form-control')) }}</td>           
    </tr>
    <tr>
      <th>Senha</th><td scope="row">{{ Form::password('senha',array('class' => 'form-control','placeholder'=>'******')) }}</td>           
    </tr>
 
    
        
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/cliente' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop