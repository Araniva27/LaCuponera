<?php

class Companies extends Validator
{
    /**
     * Atributos de la clase
     */
    private $idEmpresa = null;
    private $nombre = null;
    private $codigo = null;
    private $direccion = null;
    private $nombreContacto = null;
    private $telefono = null;
    private $correo = null;
    private $comision = null;
    private $idRubro = null;

    /**
     * Método para asignar id de la empresa
     */
    public function setIdEmpresa($value)
    {
        $this->idEmpresa = $value;
    }

    /**
     * Método para obtener el id de la empresa
     */
    public function getIdEmpresa()
    {
        return $this->idEmpresa;
    }

    /**
     * Método para asignar el nombre de la empresa
     */
    public function setNombre($value)
    {
        $this->nombre = $value;
    }

    /**
     * Método para obtener el nombre de la empresa
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Método para asignar código de empresa
     */
    public function setCodigo($value)
    {
        if($this->validateCompanieCode($value)){
            $this->codigo = $value;
            return true;
        }else{
            return false;
        }
        
    }

    /**
     * Método para obtener código de empresa
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Método para asignar dirección
     */
    public function setDireccion($value)
    {
        $this->direccion = $value;
    }

    /**
     * Método para obtener dirección
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Método para asginar nombre de contacto
     */
    public function setNombreContacto($value)
    {
        $this->nombreContacto = $value;
    }

    /**
     * Método para obtener nombre de contacto
     */
    public function getNombreContacto()
    {
        return $this->nombreContacto;
    }

    /**
     * Método para asignar número de teléfono
     */
    public function setTelefono($value)
    {
        if($this->validatePhoneNumber($value)){
            $this->telefono = $value;
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para obtener número de telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Método para asignar correo
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
     * Método para obtener correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Método para asignar comisión de la empresa
     */
    public function setComision($value)
    {
        $this->comision = $value;
    }

    /**
     * Método para obtener comisión
     */
    public function getComision()
    {
        return $this->comision;
    }

    /**
     * Método para obtener el id del rubro
     */
    public function setIdRubro($value)
    {
        $this->idRubro = $value;
    }

    /**
     * Método para obtener el id del rubro
     */
    public function getIdRubro()
    {
        return $this->idRubro;
    }


}   

?>