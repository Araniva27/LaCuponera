<?php

/**
 * Clase para manejar las sesiones
 */
require_once 'model.php';
class Sesion extends Model
{
    public function getUsuario($usuario=array())
    {
        $query = "SELECT idUsuario,usuario,nivel FROM usuario where usuario = :usuario AND contra = :contra AND estado = 1";
        $infoUsuario = $this->getQuery($query,$usuario);
        return $infoUsuario;
    }
}