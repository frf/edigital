<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 17:12
 */

class ClientePgtos extends Eloquent
{

    protected $table = 'cliente_pgtos';

    public function getClientes(){
        return $this->hasMany('Clientes','id','idcliente'); // this matches the Eloquent model
    }

} 