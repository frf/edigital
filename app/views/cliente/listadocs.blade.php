@extends('layout')
@extends('sidebar')

@section('content')

<h3>Cliente</h3>
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
			@foreach($objDocumento as $aDocumento)
			
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

@stop