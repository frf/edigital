<?php

class DocumentoController extends BaseController {

	public function getIndex()
	{
          

	}

	public function getListar($id=1)
	{
		$oCliente = ClientesQuery::create()->filterById($id)->findOne();
		$oDocumentos = $oCliente->getDocumentoss();

		return View::make('documento.listar', compact('oCliente','oDocumentos'));
	}

	public function getInserir(){

		$idCliente = Input::get('id');

		if($idCliente == ""){
			return Redirect::to('/documento/listar')->with('message-erro','Nenhum cliente encontrado!');
		}

		return View::make('documento.inserir', compact('null'));
	}

	public function postInserir()
	{
		
		$idCliente = Input::get('id');
		
		if($idCliente == ""){
			return Redirect::to('/documento/listar')->with('message-erro','Nenhum cliente encontrado!');
		}

		$oCliente = ClientesQuery::create()->filterById($idCliente)->findOne();

		return View::make('documento.inserir', compact('oCliente'));
	}

	public function postSave()
	{

		 $documento = new Documentos();
		 $documento->id_categorias = Input::get('categoria');
		 //$documento->endereco = Input::get('endereco');
		 $documento->datainclusao = date('d/m/Y H:i:s');
		 $documento->id_cliente = Input::get('idCliente');
		 $documento->nomedocumento = Input::get('nome');
		 $documento->descricao = Input::get('descricao');
		 
		 var_dump($documento);

	}
}
