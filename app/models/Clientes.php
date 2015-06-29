<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 17:12
 */

class Clientes extends Eloquent
{

    protected $table = 'cliente';
    public $timestamps = false;

    public function getUsuarioss(){
        return $this->hasMany('Usuario','idcliente','id'); // this matches the Eloquent model
    }
    public function getDocumentoss(){
        return $this->hasMany('Documentos','idcliente','id'); // this matches the Eloquent model
    }
    public function getCategoriass(){
        return $this->hasMany('Categorias','id_cliente','id'); // this matches the Eloquent model
    }
    public function getClientePgtoss(){
        return $this->hasMany('ClientePgtos','idcliente','id'); // this matches the Eloquent model
    }
    public function getProdutoss(){
        return $this->hasMany('Produto','idcliente','id'); // this matches the Eloquent model
    }




} 