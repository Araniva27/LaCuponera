<?php

require_once 'Controller.php';
require_once './Model/user.php';
require_once './Model/validator.php';


class UserController extends Controller
{
    
    private $model;

    function __construct()
    {
        
        $this->model = new User();
        
    }


    public function verificar()
    {
        if(isset($_POST['verificar']))
        {
            extract($_POST);
            $errores = array();
            $usuario = array();
            $usuario['token'] = $token;
            $usuario['correo'] = $correo;
            
        }

            if(empty($correo) || !isset($correo))
            {
                array_push($errores, 'Debe de ingresar un correo');
            }
            else if(!validateEmail($correo))
            {
                array_push($errores, 'Formato de correo incorrecto');
            }

            if(empty($token)){
                array_push($errores, 'Debe de ingresar un token');
            }

            if(count($errores) == 0)
            {
                $consulta = array();
                $consulta = $this->model->verificarToken($usuario);

                if(count($consulta) > 0)
                {                  
                    //Aqui se tendria que generar el token y enviarlo por correo 
                    //Usuario registrado

                    if($this->model->activarUsuario($usuario) > 0)
                    {
                        $_SESSION['success_message'] = "Usuario validado";  
                        header('location: /LaCuponera/View/login.php');
                    }
                    else 
                    {
                        array_push($errores, "El usuario ya esta validado");
                        $viewBag['errores'] = $errores;
                        $viewBag['usuario'] = $usuario;
                        $this->render("validateCode.php", $viewBag);
                    }
                }
                else
                {
                    array_push($errores, "Error al validar");
                    $viewBag['errores'] = $errores;
                    $viewBag['usuario'] = $usuario;
                    $this->render("validateCode.php", $viewBag);
                }
            }
            else
            {
                $viewBag['errores'] = $errores;
                $viewBag['usuario'] = $usuario;
                $this->render("validateCode.php", $viewBag);
            }
    }

    public function getDataUser($id)
    {
        $viewBag = array();
        $datos = $this->model->showUserInfo($id);
        $viewBag['datos'] = $datos;
        $this->render("updateUsersInfo.php", $viewBag);
    }
}
?>