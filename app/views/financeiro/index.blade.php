@extends('layout')
@extends('sidebar')

@section('content')

@if(Auth::user()->tipo == 'cliente')
<h3>Minhas Informações</h3>
@else
<h3>Lista de Clientes</h3>
@endif

@if(Auth::user()->tipo == 'admin')
    <a href="#" class="btn btn-primary btn-large"><i class="icon-white icon-plus"></i> Novo Cliente</a>
@endif

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
            <th>Valor</th>
            <th>Ferramentas</th>
          </tr>
        </thead>
        
        @foreach ($pgtos as $pgto)
            <tr>
              <td scope="row">{{ $pgto->getValor() }}</td>              
              <td scope="row">-</td>              
            </tr>
        @endforeach
  </table>
</div>

@stop