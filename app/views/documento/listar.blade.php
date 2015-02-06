@extends('layout')
@extends('sidebar')

@section('content')

@extends('cliente.menu')

@if(Auth::user()->tipo == 'admin')
    <a href="/documento/inserir/{{ $id }}" class="btn btn-primary btn-large margem"><i class="icon-white icon-plus"></i> Novo Documento</a>
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
    <div class="table-responsive" >	
	<table class="table" id="no-more-tables">
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
			    <td data-title="Categoria">{{ $aDocumento->getCategorias()->getNomecategoria() }}</td>
			    <td data-title="Documento">{{ $aDocumento->getNomeDocumento() }}</td>
			    <td data-title="Descriçao">@if($aDocumento->getDescricao()) 
                                                            {{ $aDocumento->getDescricao() }} 
                                                       @else
                                                            {{"-"}} 
                                                       @endif</td>
			    <td data-title="Data">{{ $aDocumento->getDatainclusao('d/m/Y H:i') }}</td>
                            <td data-title="Ferramentas">
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