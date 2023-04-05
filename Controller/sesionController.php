<?php

require_once 'Controller.php';
require_once './Model/sesion.php';
require_once './Model/validator.php';

class SesionController extends Controller
{
    
    private $model;

    function __construct()
    {
        $this->model = new Sesion();
    }


    public function Iniciar()
    {
        if(isset($_POST['iniciar']))
        {
            extract($_POST);
            $errores = array();
            $usuario = array();
            $usuario['usuario'] = $correo;
            $usuario['contra'] = $contra;            
        }

            if(empty($correo) || !isset($correo))
            {
                array_push($errores, 'Debe de ingresar un correo');
            }
            else if(!validateEmail($correo))
            {
                array_push($errores, 'Formato de correo incorrecto');
            }

            if(empty($contra)){
                array_push($errores, 'Debe de ingresar su contraseña');
            }

            if(count($errores) == 0)
            {
                $infoUsuario = $this->model->getUsuario($usuario);
                if(count($infoUsuario) > 0)
                {
                    if($infoUsuario[0]['nivel'] == 1)
                    {
                        $_SESSION["user"]["usuario"]=$infoUsuario[0]['usuario'];
                        $_SESSION["user"]["nivel"]=$infoUsuario[0]['nivel']; 
                        $_SESSION['success_message'] = "¡Bienvenido " . $_SESSION["user"]["usuario"] . "!";
                        $_SESSION["user"]["nivel"]=$infoUsuario[0]['nivel'];  ;
                        header('location: /LaCuponera/View/index.php');
                    }
                }
                else
                {
                    array_push($errores, "Error al iniciar sesión");
                    $viewBag['errores'] = $errores;
                    $viewBag['usuario'] = $usuario;
                    $this->render("login.php", $viewBag);
                }
            }
            else
            {
                $viewBag['errores'] = $errores;
                $viewBag['usuario'] = $usuario;
                $this->render("validateCode.php", $viewBag);
            }
    }
}
?>