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
                
                if(count($infoUsuario) > 0 &&  $this->validarContra($contra,$infoUsuario[0]["contra"]) == true)
                {
                    //validamos que la cuenta este activa
                    if($infoUsuario[0]["usuario"] == $correo && $infoUsuario[0]["estado"] == 1)
                    {
                        //Nivel de usuario
                        if($infoUsuario[0]['nivel'] == 1)
                        {
                            $_SESSION["user"]["usuario"]=$infoUsuario[0]['usuario'];
                            //aqui estoy guardando el id del usuario
                            //$_SESSION["user"]["id"] = $infoUsuario[0]['id'];
                            $_SESSION["user"]["id"] = $infoUsuario[0]['id'];

                            $sesion = new Sesion();
                            //$idCliente = $sesion->getIdCliente($_SESSION["user"]["id"]);
                            $idCliente = $sesion->getIdCliente($_SESSION["user"]["id"]);
                            $_SESSION["cliente"]["idCliente"] = $idCliente[0]["idCliente"];


                            //$_SESSION['id'] = $_SESSION["user"]["id"];
                            $_SESSION['id'] = $_SESSION["user"]["id"];
                            $_SESSION['nombreU'] = $_SESSION["user"]["usuario"];
                            $_SESSION["user"]["nivel"]=$infoUsuario[0]['nivel']; 
                            $_SESSION['success_message'] = "¡Bienvenido " . $_SESSION["user"]["usuario"] . "!";
                            $_SESSION["user"]["nivel"]=$infoUsuario[0]['nivel'];
                            $_SESSION["user"]["Nombre"]=$infoUsuario[0]['Nombre'];
                            echo "hola";  
                            header('location: /LaCuponera/View/index.php');
                        }
                    }
                    else
                    {
                        array_push($errores, "Su cuenta no ha sido activada. Revise su correo e ingrese el token para validar su correo");
                        $viewBag['errores'] = $errores;
                        $viewBag['usuario'] = $usuario;
                        $this->render("login.php", $viewBag);
                    }                    
                }
                else
                {
                    
                    array_push($errores, "Credenciales incorrectas");
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

    public function validarContra($contraIngresada,$hash)
    {
        //$hash_ingresado = password_hash($contraIngresada, PASSWORD_BCRYPT);
        //echo  $hash_ingresado . "<br>";

        if (password_verify($contraIngresada, $hash)) 
        {
            return true;
        } else 
        {
            return false;
        }
    }

    public function cerrarSesion()
    {
        unset($_SESSION['user']);
        session_destroy();
        $_SESSION['cerrar_sesion_message'] = "Se ha cerrado la sesión correctamente";
        header('location: /LaCuponera/View/index.php');
    }
}
?>