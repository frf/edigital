<?php

class DocumentoController extends BaseController {

	public function getIndex()
	{
          

	}

	public function getExcluir($id)
	{
            $caminhoDoc = __DIR__.'/../storage/documento/';
		
            if(!is_numeric($id)){
                return Redirect::to('/')->with('message-erro','Documento não encontrado!');
            }
            
            $oDocumento = Base\DocumentosQuery::create()->findPk($id);
            $idCliente = $oDocumento->getIdcliente();
            
            if(!$oDocumento){
                return Redirect::to('/documento/listar/'.$idCliente)->with('message-erro','Documento não encontrado!');
            }
            
            @unlink($caminhoDoc.$oDocumento->getCaminhodoc());
            
            $oDocumento->getDocumentosDownloadss()->delete();
            $oDocumento->delete();
            
            return Redirect::to('/documento/listar/'.$idCliente)->with('message-sucess','Removido com sucesso!');
	}
	public function getDownloadDocumento($id)
	{
            $caminhoDoc = __DIR__.'/../storage/documento/';
            
            if(!is_numeric($id)){
                return Redirect::to('/')->with('message-erro','Documento não encontrado!');
            }
            
            $oDocumento = Base\DocumentosQuery::create()->findPk($id);
            
            if(!$oDocumento){
                return Redirect::to('/')->with('message-erro','Documento não encontrado!');
            }
            if(Auth::check()){
                
                
                $oDocumentoDownload = new DocumentosDownloads();
                $oDocumentoDownload->setIddocumento($oDocumento->getId());
                $oDocumentoDownload->setIdusuario(Auth::user()->id);
                $oDocumentoDownload->setDtdownload(date('Y-m-d H:i:s'));
                
                $oDocumentoDownload->save();
            }
            return Response::download($caminhoDoc . $oDocumento->getCaminhodoc(), $oDocumento->getNomefisicodocumento());
            	
	}
	public function getListar($id)
	{
            
		$oCliente = ClientesQuery::create()->filterById($id)->findOne();
		$oDocumentos = $oCliente->getDocumentoss();
                $caminhoDoc = __DIR__.'/../storage/documento/';
                
		return View::make('documento.listar', compact('oCliente','oDocumentos','caminhoDoc'));
            
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
		 $destino = '/tmp/';
		 
		 $file = Input::file('arquivo');
                 
                 if(Input::get('idCliente') == ""){
                     return Redirect::to('/documento/listar')->with('message-erro','Cliente não encontrado!');
                 }
                 
		 $documento = new Documentos();
		 $documento->setIdCliente(Input::get('idCliente'));
		 $documento->setNomeDocumento(Input::get('nome'));
		 $documento->SetDescricao(Input::get('descricao'));
		 $documento->setIdCategoria(Input::get('idcategoria'));
		 $documento->SetDatainclusao(date('Y-m-d H:i:s'));
                 $documento->setNomefisicodocumento($file->getClientOriginalName());
                 
                 if(Input::hasFile('arquivo')){
                        $fileName = Input::get('idCliente'). "_" .md5($file->getClientOriginalName() . date('Ymd')).".".$file->getClientOriginalExtension();
                        $file->move(__DIR__.'/../storage/documento/',$fileName);
                        $documento->setCaminhodoc($fileName);
                 }
                 
		 $documento->save();

                 return Redirect::to('/documento/listar/'.Input::get('idCliente'))->with('message-sucess','Cadastrado com sucesso!');

	}
}
