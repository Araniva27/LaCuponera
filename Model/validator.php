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

?>