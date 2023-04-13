<?php

/**
 * Clase para menejar las operaciones de la tabla cliente
 */
require_once 'model.php';
class Client extends Model
{
    public function get($id="")
    {
        if($id=="")
        {
            $query = "SELECT * FROM cliente";
            return $this->getQuery($query);
        }
        else
        {
            $query = "SELECT * FROM cliente WHERE idCliente = :idCliente";
            return $this->getQuery($query, ['idCliente'=>$id]);
        }
    }

    public function insertarCliente($cliente=array())
    {
        $query = "INSERT INTO cliente VALUES (NULL, :nombres, :apellidos,:correo, :direccion, :dui, :telefono)";
        return $this->setQuery($query,$cliente);
    }

    public function insertarUsuario($usuario=array())
    {
        // Generamos un salt aleatorio
        //$salt = openssl_random_pseudo_bytes(22);

        // Combinamos la contraseña con el salt
        $contrasena = $usuario["contra"];
        //$contrasena_con_salt = $salt . $contrasena;

        // Encriptar la contraseña con salt utilizando password_hash
        $hash = password_hash($contrasena, PASSWORD_BCRYPT);

        //nuevo arreglo
        $user = array();

        $user["dui"] = $usuario["dui"];
        $user["usuario"] = $usuario["usuario"];
        $user["contra"] = $hash;

        
        $query = "INSERT INTO usuario VALUES (:dui, :usuario, :contra,1 ,0)";
        return $this->setQuery($query,$user);
    }

    public function updateUsuarioInfo($usuario=array())
    {
        $query = "Update cliente set direccion = :direccion, nombres = :nombres, apellidos= :apellidos, telefono = :tel WHERE dui = :dui";
        return $this->setQuery($query,$usuario);
    }

    public function verificarDui($dui)
    {
        $query = "SELECT * FROM cliente WHERE dui = :dui";
        return $this->getQuery($query,['dui'=>$dui]);
    }

    public function verificarCorreo($correo)
    {
        $query = "SELECT * FROM cliente WHERE correo = :correo";
        return $this->getQuery($query,['correo'=>$correo]);
    }

    public function verificarTelefono($telefono)
    {
        $query = "SELECT * FROM cliente WHERE telefono = :telefono";
        return $this->getQuery($query,['telefono'=>$telefono]);
    }
}
