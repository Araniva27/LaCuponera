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
    private $modelSesion;

    function __construct()
    {        
        $this->model = new Sesion();
        $this->modelUser = new User();
        $this->modelCorreo = new Correo();
        $this->modelSesion = new Sesion();
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

    public function cambiarContra()
    {
        if(isset($_POST['btnCambiarContra']))
        {
            extract($_POST);
            $errores = array();
            $password = array();   
            $password["contraActual"] = $contraActual;
            $password["contraNueva1"] = $contraNueva1;
            $password["contraNueva2"] = $contraNueva2;
        }

            if(empty($contraActual) || empty($contraNueva1) || empty($contraNueva2))
            {
                array_push($errores, 'Debe llenar todos los campos');
            }
            else if($contraNueva1 != $contraNueva2)
            {
                array_push($errores, 'Las contraseñas no coinciden');
            }
            else if(!validatePassword($contraNueva1))
            {
                array_push($errores, "La contraseña no cumple el formato correcto (De 8 a 16 caracteres, 1 letra mayuscula, al menos un número y al menos un caracter especial)");
            }
            else if(count($this->modelUser->getPassword($contraActual,$_SESSION["user"]["usuario"]))  == 0)
            {
                array_push($errores, 'Su contraseña actual no es correcta');
            }


            if(count($errores) == 0)
            {
                //Actualizar contraseña en base de datos
                if($this->modelUser->actualizarContra($contraNueva1,$_SESSION["user"]["usuario"]) > 0)
                {
                    $this->modelSesion->cerrarSesion();
                    $_SESSION['contra_cambiada'] = "Su contraseña ha sido cambiada, debe loguearse de nuevo";
                    
                    header('location: /LaCuponera/View/login.php');
                }
                else
                {
                    $_SESSION['error_actualizar_contra'] = "Ha habido un error al intentar cambiar su contraseña"; 
                    header('location: /LaCuponera/View/recuperarContra.php');
                }
            }
            else
            {
                $viewBag['errores'] = $errores;
                $viewBag['password'] = $password;
                $this->render("cambiarContra.php", $viewBag);
            }
    }

    
}
?>