<?php

/**
 * Clase para menejar las operaciones de la tabla empresa
 */
require_once 'model.php';
class Companies extends Model
{
    public function get($id=""){
        if($id=""){
            $query = "SELECT * FROM empresa";
            return $this->getQuery($query);
        }else{
            $query = "SELECT * FROM empresa WHERE idEmpresa = :idEmpresa";
            return $this->getQuery($query, ['idEmpresa'=>$id]);
        }
    }    
}