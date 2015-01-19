@extends('layout')
@extends('sidebar')

@section('content')

<h3>Lista de Login</h3>

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
    
   
  <table class="table">
      <thead>
          <tr>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
          </tr>
        </thead>
        
        @foreach ($usuarios as $usuario)
            <tr>
              <td scope="row">{{ $usuario->nome }}</td>
              <td scope="row">{{ $usuario->email }}</td>
              <td scope="row">{{ $usuario->tipo }}</td>
              
            </tr>
        @endforeach
  </table>
</div>

@stop