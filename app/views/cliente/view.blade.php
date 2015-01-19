@extends('layout')
@extends('sidebar')

@section('content')

<h3>Informações do Cliente</h3>

@extends('cliente.menu')


<div class="table-responsive">
    {{ Form::open() }}
  <table class="table">
      
    <tr>
      <th>Nome</th><td scope="row">{{ $cliente->getNome() }}</td>             
    </tr>
    <tr>
      <th>Email</th><td scope="row">{{ $cliente->getEmail() }}</td>             
    </tr>
 
    
        
  </table>
    
   
    <a href='/cliente/editar/{{ $cliente->getId() }}' class="btn btn-sm btn-success">Editar</a>
   
</div>

@stop