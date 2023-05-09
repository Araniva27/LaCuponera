<?php

/**
 * Clase para manejar las sesiones
 */
require_once 'model.php';
class Sesion extends Model
{
    public function getUsuario($usuario=array())
    {
        //$query = "SELECT id,usuario,nivel,estado,contra, CONCAT(cliente.nombres,' ',cliente.apellidos) as Nombre FROM usuario INNER JOIN cliente ON usuario.id = cliente.dui where usuario = :usuario";
        $query = "SELECT id,usuario,nivel,estado,contra, CONCAT(cliente.nombres,' ',cliente.apellidos) as Nombre FROM usuario INNER JOIN cliente ON usuario.id = cliente.dui where usuario = :usuario";
        $infoUsuario = $this->getQuery($query,$usuario);
        return $infoUsuario;
    }
    public function getIdCliente($idCliente)
    {
        $query ="SELECT idCliente FROM usuario inner join cliente on usuario.id = cliente.dui where usuario.estado = 1 and usuario.id = :id";
            return $this->getQuery($query,['id'=>$idCliente]);
    }

    public function cerrarSesion()
    {
        unset($_SESSION['user']);
        //session_destroy();
    }
}