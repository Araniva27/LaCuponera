<?php

require_once 'Controller.php';
require_once './Model/client.php';
require_once './Model/validator.php';

class ClientController extends Controller{
    
    private $model;

    function __construct()
    {
        $this->model = new Client();
    }

    public function index(){       
        $this->render("index.php");
    }

    public function create(){
        $this->render("newClient.php");
    }

    public function add(){
        if(isset($_POST['registrar'])){
            extract($_POST);
            $errores = array();
            $cliente = array();
            $usuario = array();
            $viewBag = array();
            $cliente['nombres'] = $nombres;
            $cliente['apellidos'] = $apellidos;
            $cliente['correo'] = $correo;
            $cliente['direccion'] = $direccion;
            $cliente['dui'] = $dui;
            $cliente['telefono'] = $telefono; 
            $usuario['contra'] = $contra;
             
            
            if(empty($nombres)){
                array_push($errores, 'Debe de ingresar un nombre');
            }

            if(empty($apellidos)){
                array_push($errores, 'Debe de ingresar un apellido');
            }

            if(empty($correo) || !isset($correo)){
                array_push($errores, 'Debe de ingresar un correo');
            }else if(!validateEmail($correo)){
                array_push($errores, 'Formato de correo incorrecto');
            }

            if(empty($direccion)){
                array_push($errores, 'Debe de ingresar una dirección');
            }

            if(empty($dui) || !isset($dui)){
                array_push($errores, 'Debe de ingresar un DUI correcto');
            }else if(!validateDUI($dui)){
                array_push($errores, 'Formato de DUI incorrecto');
            }
            

            if(empty($telefono) || !isset($telefono)){
                array_push($errores, 'Debe de ingresar un número de teléfono');
            }else if(!validatePhoneNumber($telefono)){
                array_push($errores, 'Formato de teléfono incorrecto');
            }
            
            if(empty($contra) || empty($contraRep)){
                array_push($errores, 'Debe de ingresar contraseña y su verificación');
            }else if($contra != $contraRep){
                array_push($errores, 'Las contraseñas no coinciden');
            }

            if(count($errores) == 0){
                if($this->model->insertarCliente($cliente) >0){
                    $_SESSION['success_message'] = "Cliente registrad correctamente";                    
                    //Aqui se tendria que generar el token y enviarlo por correo 
                    header('location: /LaCuponera/View/validateCode.php');
                }else{
                    array_push($errores, "Ya existe el cliente que desea registrar");
                    $viewBag['errores'] = $errores;
                    $viewBag['cliente'] = $cliente;
                    $this->render("newClient.php", $viewBag);
                }
            }else{
                $viewBag['errores'] = $errores;
                $viewBag['cliente'] = $cliente;
                $this->render("newClient.php", $viewBag);
            }

        }
    }
}
?>