@extends('layout')
@extends('sidebar')

@section('content')

<h3>Dados Usuário</h3>

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
    
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ Form::text('nome',$cliente->getNome(),array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ $cliente->getEmail() }}</td>
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