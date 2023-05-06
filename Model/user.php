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
        $query ="SELECT nombres, apellidos, cliente.correo as correo, cliente.direccion as direccion, cliente.dui as dui, cliente.telefono as tel FROM usuario inner join cliente on usuario.id = cliente.dui where usuario.estado = 1 and usuario.id = :id";
        return $this->getQuery($query,['id'=>$id]);
    }
    public function comprobarCorreo($correo)
    {
        $query ="SELECT usuario FROM usuario WHERE usuario = :correo";
        return $this->getQuery($query,['correo'=>$correo]);
    }

    public function actualizarContra($contra,$correo)
    {   
        $hash = password_hash($contra, PASSWORD_BCRYPT);

        $usuario = array();
        $usuario['correo'] = $correo;
        $usuario['contra'] = $hash;

        $query = "UPDATE usuario SET contra = :contra WHERE usuario = :correo";
        return $this->setQuery($query,$usuario);
    }

    public function getPassword($contraIngresada,$correo)
    {
        $usuario = array();
        $usuario['usuario'] = $correo;

        $query ="SELECT contra FROM usuario WHERE usuario = :usuario";
        $contra = $this->getQuery($query,$usuario);
        

        if (password_verify($contraIngresada, $contra[0]["contra"])) 
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}