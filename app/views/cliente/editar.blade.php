@extends('layout')
@extends('sidebar')

@section('content')

@extends('cliente.menu')

<h3>Editar Cliente</h3>
<div class="table-responsive">
    {{ Form::open() }}
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ Form::text('nome',$oCliente->nome,array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ Form::text('email',$oCliente->email,array('class' => 'form-control')) }}</td>             
    </tr>
 
    
        
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/cliente/view/{{$id}}' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop