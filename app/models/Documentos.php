<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 17:12
 */

class Documentos extends Eloquent
{

    protected $table = 'documentos';


    public function getDocumentosDownloadss(){
        return $this->hasMany('DocumentosDownloads','iddocumento','id'); // this matches the Eloquent model
    }

} 