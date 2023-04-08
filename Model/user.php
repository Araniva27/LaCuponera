<?php

/**
 * Clase para menejar las operaciones de la tabla cliente
 */
require_once 'model.php';
class User extends Model
{

    public function verificarToken($usuario=array())
    {
        $query = "select token,correo from token where token = :token and correo = :correo";
        return $this->getQuery($query,$usuario);
    }

    public function activarUsuario($usuario=array())
    {
        $correo = array();
        $correo['correo'] = $usuario['correo'];

        $query = "UPDATE usuario set estado = 1 where usuario = :correo";
        return $this->setQuery($query,$correo);
    }

    public function showUserInfo($id)
    {
        $query ="SELECT nombres, apellidos, cliente.correo as correo, cliente.direccion as direccion, cliente.dui as dui, cliente.telefono as tel FROM usuario inner join cliente on usuario.idUsuario = cliente.dui where usuario.estado = 1 and usuario.idUsuario = :id";
        return $this->getQuery($query,['id'=>$id]);
    }
}