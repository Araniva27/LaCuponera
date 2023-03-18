<?php

/**
 * Clase para menejar las operaciones de la tabla cliente
 */

class Client extends Validator
{
    /**
     * Atributos de la clase para el manejo de datos
    */
    private $idCliente = null;
    private $nombres = null;
    private $apellidos = null;
    private $correo = null;
    private $direccion = null;
    private $dui = null;

    /**
    * Método para asignar el valor del id del cliente
    *
    *@param int $value define el id que se quiere asignar al cliente
    
    */
    public function setIdCliente($value)
    {
        $this->idCliente = $value;
    }

    /**
    *Método para obtener el id del cliente 
    *
    *@param int $value es el id de un cliente
    */
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Método para asignar el nombre del cliente
     * 
     * @param string define el nombre del cliente
     * 
     */
    public function setNombres($value)
    {
        $this->nombres = $value;
    }

    /**
     * Método para obtener el nombre del cliente
     * 
     * @return string el nombre del cliente
     * 
     */
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Método para asignar el apellido del cliente
     * 
     * @param string define el apellido del cliente
     * 
     */
    public function setApellidos($value)
    {
        $this->apellidos = $value;
    }

    /**
     * Método para obtener el apellido del cliente
     * 
     * @return string el apellido de cliente
     * 
     */
    public function getApellidos($value)
    {
        return $this->apellidos;
    }

    /**
     * Método para asignar el correo del cliente
     * 
     * @param string define el correo electrónico del cliente
     * 
     * @return boolean true si se le asignó el valor y false en caso contrario
     * 
     */
    public function setCorreo($value)
    {
        if($this->validateEmail($value)){
            $this->correo = $value;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para obener el correo del cliente
     * 
     * @return string el correo del cliente
     * 
     */
    public function getCorreo($value)
    {
        return $this->correo;
    }

    /**
     * Método para asignar la dirección del cliente
     * 
     * @param string define la dirección del cliente
     * 
     */
    public function setDireccion($value)
    {
        $this->direccion = $value;
    }

    /**
     * Método para obtener la dirección del cliente
     * 
     * @return string la dirección del cliente
     * 
     */
    public function getDireccion($value)
    {
        return $this->direccion;
    }

    /**
     * Método para asignar el DUI del cliente
     * 
     * @param string define el DUI del cliente
     * 
     * @return boolean true si se le asignó el valor y false si es caso contrario
     * 
     */
    public function setDui($value)
    {
        if($this->validateDUI(($value))){
            $this->dui = $value;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para obtener el DUI del cliente
     * 
     * @return string el DUI del cliente
     * 
     */
    public function getDui($value)
    {
        return $this->dui;

    }
}
