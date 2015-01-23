@extends('layout')
@extends('sidebar')

@section('content')

<h3>Lançamento Financeiro</h3>
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
    {{ Form::open(array('url' => 'financeiro/salvar-lancamento','files'=>true)) }}
    {{ Form::text('idcliente',null,array('class' => 'form-control')) }}
  <table class="table">    
    <tr>
      <th>Descrição</th><td scope="row">{{ Form::text('descricao',null,array('class' => 'form-control')) }}</td>             
    </tr>
    <tr>
      <th>Valor</th><td scope="row">{{ Form::text('valor',null,array('class' => 'form-control')) }}</td>           
    </tr>
    <tr> 
      <th>Nota Fiscal</th><td scope="row">{{ Form::file('nota',null,array('class' => 'form-control')) }}</td>           
    </tr>
    <tr> 
      <th>Pago</th><td scope="row">{{ Form::checkbox('ispaid',null,array('class' => 'form-control')) }}</td>           
    </tr>
  </table>
    
    {{ Form::submit('Salvar',array('class' => 'btn btn-sm btn-success')); }}
    <a href='/financeiro' class="btn btn-sm btn-info">Voltar</a>
    {{ Form::close() }}
</div>

@stop