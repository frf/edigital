@extends('layout')
@extends('sidebar')

@section('content')

<h3>Cadastro de Usuário do Cliente</h3>

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

<div class="table-responsive">
    {{ Form::open() }}
    {{ Form::hidden('id',$id,array('class' => 'form-control')) }}
    
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ Form::text('nome',$email,array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ Form::text('email',$email,array('class' => 'form-control')) }}</td>           
    </tr>
    <tr>
      <th>Linguagem</th><td scope="row">{{ Form::select('lang', array('pt'=>'PT','en'=>'EN'),1,array('class' => 'form-control input-small')) }}</td>           
    </tr>
    <tr>
      <th>Senha</th><td scope="row">{{ Form::password('senha',array('class' => 'form-control')) }}</td>           
    </tr>
 
    
        
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/cliente/listar-login/{{ $id }}' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop