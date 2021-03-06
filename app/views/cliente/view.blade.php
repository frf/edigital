@extends('layout')
@extends('sidebar')

@section('content')

<h3>Informações do Cliente</h3>

@extends('cliente.menu')


<div class="table-responsive">
    {{ Form::open() }}
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ $oCliente->nome }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ $oCliente->email }}</td>
    </tr>
 
    
        
  </table>
    
   
    <a href='/cliente/editar/{{ $oCliente->id }}' class="btn btn-sm btn-success">Editar</a>
   
</div>

@stop