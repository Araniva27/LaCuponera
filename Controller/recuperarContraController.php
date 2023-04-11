<?php

require_once 'Controller.php';
require_once './Model/sesion.php';
require_once './Model/validator.php';
require_once './Model/user.php';
require_once './Model/correo.php';

class recuperarContraController extends Controller
{
    
    private $model;
    private $modelUser;
    private $modelCorreo;

    function __construct()
    {        
        $this->model = new Sesion();
        $this->modelUser = new User();
        $this->modelCorreo = new Correo();
    }


    public function recuperarContra()
    {
        if(isset($_POST['btnRecuperar']))
        {
            extract($_POST);
            $errores = array();
            $correoArreglo = array();   
            $correoArreglo["correo"] = $correo;
        }

            if(empty($correo) || !isset($correo))
            {
                array_push($errores, 'Debe de ingresar un correo');
            }
            else if(!validateEmail($correo))
            {
                array_push($errores, 'Formato de correo incorrecto');
            }

            if(count($errores) == 0)
            {
                $consultaCorreo = $this->modelUser->comprobarCorreo($correo);
                if(count($consultaCorreo) == 0)
                {
                    array_push($errores, 'El correo ingresado no esta registrado');
                }
            }
            
            if(count($errores) == 0)
            {
                //Generar nueva contraseña
                $nuevaContra = $this->generarContra($correo);

                //Actualizar contraseña en base de datos
                if($this->modelUser->actualizarContra($nuevaContra,$correo) > 0)
                {
                    $_SESSION['contra_nueva'] = "Se ha enviado la nueva contraseña a su correo"; 
                    //Enviar correo con contraseña nueva
                    $this->modelCorreo->enviarNewContra($nuevaContra,$correo);
                    header('location: /LaCuponera/View/login.php');
                }
                else
                {
                    $_SESSION['error_actualizar_contra'] = "Ha habido un error al intentar restaurar su contraseña"; 
                    header('location: /LaCuponera/View/recuperarContra.php');
                }
            }
            else
            {
                $viewBag['errores'] = $errores;
                $viewBag['correo'] = $correo;
                $this->render("recuperarContra.php", $viewBag);
            }
    }


    public function generarContra($correo)
    {
        $newContra = password_hash($correo, PASSWORD_DEFAULT);
        $newContra = substr($newContra, -10);
        return $newContra;
    }
}
?>