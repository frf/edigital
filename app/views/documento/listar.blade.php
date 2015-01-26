@extends('layout')
@extends('sidebar')

@section('content')

<h3>Cliente: {{  $oCliente->getNome() }}</h3>

{{ Form::open(array('url' => '/documento/inserir', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post' )) }}
<input type="hidden" name="id" value="{{ $oCliente->getId() }}">
<input type="hidden" name="nome" value="{{ $oCliente->getNome() }}">


{{ Form::submit('Novo Documento',  array('class' => 'btn btn-primary')) }}
<p>
<div class="table-responsive">
	
	<table class="table table-bordered">

		<thead>
			<tr>
				<th>Categoria</th>
				<th>Nome documento</th>
				<th>Descrição</th>
				<th>Data do cadastro</th>
				<th>Documento</th>
			</tr>
		</thead>
		<tbody>
			@foreach($oDocumentos as $aDocumento)
			
			<tr>
			    <td>{{ $aDocumento->getCategorias()->getNomecategoria() }}</td>
			    <td>{{ $aDocumento->getNomeDocumento() }}</td>
			    <td>{{ $aDocumento->getDescricao() }}</td>
			    <td>{{ $aDocumento->getDatainclusao() }}</td>
			    <td>{{ $aDocumento->getEndereco() }}</td>
			</tr>
			@endforeach
		</tbody>

	</table>

</div>
{{ Form::close() }}
@stop