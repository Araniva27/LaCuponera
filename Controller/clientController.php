<?php

require_once 'Controller.php';
require_once './Model/client.php';
require_once './Model/validator.php';
require_once './Model/correo.php';

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
            $usuario['dui'] = $dui;
            $usuario['usuario'] = $correo;
            
            
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

            if(count($this->model->verificarDui($dui)) != 0){
                array_push($errores, 'El DUI ya se encuentra registrado');
            }

            if(count($this->model->verificarCorreo($correo)) != 0){
                array_push($errores, 'El correo ya se encuentra registrado');
            }

            if(count($this->model->verificarTelefono($telefono)) != 0){
                array_push($errores, 'El telefono ya se encuentra registrado');
            }
                       

            if(count($errores) == 0)
            {                           
                if($this->model->insertarCliente($cliente) >0)
                {
                    $_SESSION['success_message'] = "Cliente registrado correctamente";                    
                    //Aqui se tendria que generar el token y enviarlo por correo 
                    //Usuario registrado
                    if($this->model->insertarUsuario($usuario) >0)
                    {
                        //enviar correo
                        $correoobj = new Correo();
                        $correoobj->enviarCorreo($usuario);
                        header('location: /LaCuponera/View/validateCode.php');
                    }
                }
                else
                {
                    array_push($errores, "Ya existe el cliente que desea registrar");
                    $viewBag['errores'] = $errores;
                    $viewBag['cliente'] = $cliente;
                    $this->render("newClient.php", $viewBag);
                }                                                 
            }
            else
            {
                $viewBag['errores'] = $errores;
                $viewBag['cliente'] = $cliente;
                $this->render("newClient.php", $viewBag);
            }

        }
    }

    public function updateClientData(){
        if(isset($_POST['modificar'])){
            extract($_POST);
            $datos = array();
            $errores = array();
            $datos['nombres'] = $nombres;
            $datos['apellidos'] = $apellidos;
            $datos['direccion'] = $direccion;
            $datos['tel'] = $telefono;            
            $datos['dui'] = $_SESSION['user']['idUsuario'];

            $_SESSION['errores'] = array();

            if(empty($nombres)){
                array_push($_SESSION['errores'], 'Debe de ingresar un nombre');
            }

            if(empty($apellidos)){
                array_push($_SESSION['errores'], 'Debe ingresar un apellido');
            }

            if(empty($direccion)){
                array_push($_SESSION['errores'], 'Debe ingresar una dirección');
            }

            if(empty($telefono)){
                array_push($_SESSION['errores'], 'Debe ingresar un número de teléfono');
            }elseif(!validatePhoneNumber($telefono)){
                array_push($_SESSION['errores'], 'Verifique el formato del teléfono');
            }

            if(count($_SESSION['errores'])==0){
                if($this->model->updateUsuarioInfo($datos)){
                    $_SESSION['success_message_updateinfo'] = "Datos actualizados correctamente";
                    header("location:/LaCuponera/user/getDataUser/".$_SESSION['user']['idUsuario']."");

                }else{
                    header("location:/LaCuponera/user/getDataUser/".$_SESSION['user']['idUsuario']."");
                }
            }else{
                               
                header("location:/LaCuponera/user/getDataUser/".$_SESSION['user']['idUsuario']."");
                    
            }
        }
    }
}
?>