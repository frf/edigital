<?php
/**
 * Created by PhpStorm.
 * User: robson
 * Date: 13/01/15
 * Time: 17:12
 */

class Chamado extends Eloquent
{

    /*
     * Relacionamento com tabela de usuario
     * hasOne('Usuario','fk','localfk')
     */
    
    public function usuario() {
        return $this->hasOne('usuario','id','idusuario'); // this matches the Eloquent model
    }
} 