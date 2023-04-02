<?php

/**
 * Clase para menejar las operaciones de la tabla cliente
 */
require_once 'model.php';
class Client extends Model
{
    public function get($id=""){
        if($id==""){
            $query = "SELECT * FROM cliente";
            return $this->getQuery($query);
        }else{
            $query = "SELECT * FROM cliente WHERE idCliente = :idCliente";
            return $this->getQuery($query, ['idCliente'=>$id]);
        }
    }

    public function insertarCliente($cliente=array()){
        $query = "INSERT INTO cliente VALUES (NULL, :nombres, :apellidos,:correo, :direccion, :dui, :telefono)";
        return $this->setQuery($query,$cliente);
    }
}
