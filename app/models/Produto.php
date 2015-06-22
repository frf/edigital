<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 17:12
 */

class Produto extends Eloquent
{

    /*
     * Relacionamento com tabela de usuario
     * hasOne('Usuario','fk','localfk')
     */
    
    public function subProduto() {
        return $this->hasMany('produto','id','idpai'); // this matches the Eloquent model
    }
} 