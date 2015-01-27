@extends('layout')
@extends('sidebar')

@section('content')
<script>
    function getProdutos(){
       if($("#idcliente").val() != "0"){
            $.getJSON( "/cliente/dados/"+$("#idcliente").val(), function( data ) {
                
                if(data.produtos != undefined){
                   $("#Descricao").hide();
                   $("#produtoCliente").show();
                   
                    if(data.Obscontrato != ""){
                        $("#obsContratoTexto").html(data.Obscontrato);
                        $("#obsContrato").show();
                    }
                    $('#idproduto').append($('<option/>', { 
                            value: '0',
                            text : 'Escolha um produto'
                        }));
                    $.each( data.produtos, function( key, val ) {
                        //items.push( "<li id='" + key + "'>" + val + "</li>" );
                        //$("#idproduto").addOption(key, val, false);
                        console.log(key);
                        console.log(val);
                        $('#idproduto').append($('<option/>', { 
                            value: key.Id,
                            text : val.Nome 
                        }));
                    });
                }else{
                   $("#produtoCliente").hide();
                }
                
            });
       }
    }
</script>
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
    <div id="teste"></div>
<div class="table-responsive">
    {{ Form::open(array('url' => 'financeiro/salvar-lancamento','files'=>true)) }}
    
        <table class="table">    
          <tr>
            <th>Cliente</th><td scope="row">{{ Form::select('idcliente', $clientes,0,array('id'=>'idcliente','class' => 'form-control','onchange'=>'getProdutos()')) }}</td>
          </tr>
          <tr id="obsContrato" style="display: none">
              <th>Contrato</th><td scope="row" id="obsContratoTexto" style="color:#B94A48"></td>
          </tr>
          <tr id="produtoCliente" style="display: none">
            <th>Produtos</th><td scope="row">{{ Form::select('idproduto', array(),0,array('id'=>'idproduto','class' => 'form-control')) }}</td>
          </tr>
          <tr id="Descricao">
            <th>Descrição</th><td scope="row">{{ Form::text('descricao',null,array('class' => 'form-control')) }}</td>             
          </tr>
          <tr>
            <th>Valor</th><td scope="row">{{ Form::text('valor',null,array('id'=>'valor','class' => 'form-control')) }}</td>           
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