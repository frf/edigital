@extends('layout')
@extends('sidebar')

@section('content')

<h3>Cliente: {{  $oCliente->getNome() }}</h3>

{{ Form::open(array('url' => '/documento/inserir', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post' )) }}
<input type="hidden" name="id" value="{{ $oCliente->getId() }}">
<input type="hidden" name="nome" value="{{ $oCliente->getNome() }}">
{{ Form::submit('Novo Documento',  array('class' => 'btn margem btn-primary ','style'=>'margin-bottom:30px')) }}
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
    <div class="table-responsive" >	
	<table class="table table-bordered" id="no-more-tables">
		<thead>
			<tr>
				<th>Categoria</th>
				<th>Nome documento</th>
				<th>Descrição</th>
				<th>Data do cadastro</th>
				<th>Ação</th>
			</tr>
		</thead>
		<tbody>
			@foreach($oDocumentos as $aDocumento)
			
			<tr>
			    <td>{{ $aDocumento->getCategorias()->getNomecategoria() }}</td>
			    <td>{{ $aDocumento->getNomeDocumento() }}</td>
			    <td>{{ $aDocumento->getDescricao() }}</td>
			    <td>{{ $aDocumento->getDatainclusao('d/m/Y H:i') }}</td>
                            <td>
                                <a href="/documento/download-documento/{{$aDocumento->getId()}}" class="btn btn-success btn-xs">Download</a>
                                @if(Auth::check())
                                 @if(Auth::user()->tipo == 'admin')
                                    <a href="/documento/excluir/{{$aDocumento->getId()}}" class="btn btn-danger btn-xs">Excluir</a>
                                 @endif
                                @endif
                                 
                            </td>
			</tr>
			@endforeach
		</tbody>

	</table>

</div>
{{ Form::close() }}
@stop