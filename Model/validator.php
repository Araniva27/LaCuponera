<?php

    /**
     * Método para validar correos electrónicos
     * @return boolean true en caso que se haya validado correctamente y false en caso de que no se haya validado
     * 
     * @param $value define que valor se validará
     */
    function validateEmail($value)
    {
        if(filter_var($value,FILTER_VALIDATE_EMAIL)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para validar número de DUI
     * @return boolean true en caso que se haya validado correctamente y false en caso de que no se haya validado
     * 
     * @param $value define que valor se validará
     */
    function validateDUI($value)
    {
        if(preg_match('/^[0-9]{8}-[0-9]{1}$/',$value)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para validar número de teléfono 
     * @return boolean true si se válido correctamente y false si no se válido correctamente
     * 
     * @param $value valor que se validará
     */
    function validatePhoneNumber($value)
    {
        if(preg_match('/^([2,6,7][0-9]{3})(-)([0-9]{4})$/',$value)){
			return true;
		}else{
			return false;
		}
    }

    /**
     * Método para validar el código de la empresa (3 letras y 3 números)
     * @return boolean true si se válido correctamente y false si no se válido correctamente
     * 
     * @param $value valor que se validará
     */
    function validateCompanieCode($value)
    {
        if(preg_match('/^[A-Z]{3}[0-9]{3}$/', $value)){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Método para válidar la contraseña
     * Al menos 1 mayúscula
     * Al menos 1 minúscula
     * Al menos 1 numero
     * Al menos un caracter especial
     * Entre 8-16 caracteres en total
     * @return boolean true si se validó correctamente y false en caso contrario
     * 
     * @param $value valor o cadena que se validará
     */
    function validatePassword($value)
    {
        if(preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,16}$/', $value)){
            return true;
        }else{
            return false;
        }
    }

    function validateVisa($value)
    {
       /* if(preg_match('/^4[0-9]{3}\s[0-9]{4}\s[0-9]{4}\s[0-9]{1}(?:[0-9]{3})?$/',$value)){
            return true;
        }else{
            return false;
        }*/
        if(preg_match('/^4[0-9]{12,15}(?:[0-9]{3})?$/',$value)){
            return true;
        }else{
            return false;
        }
    }

    function validateMastercard($value)
    {
        if(preg_match('/^(?:5[1-5][0-9]{2}|222[1-9]|22[3-9][0-9]|2[3-6][0-9]{2}|27[01][0-9]|2720)[0-9]{12}$/',$value)){
            return true;
        }else{
            return false;
        }
    }

    function validateCVV($value)
    {
        if(preg_match('/^\d{3,4}$/', $value)) {
            return true;
        }else {
            return false;
        }
    }

    function validateDateCard($value) {
        if(preg_match('/^(0[1-9]|1[0-2])\/((\d{2})|(\d{4}))$/', $value)) {
            return true;
        } else {
            return false;
        }
    }
?>