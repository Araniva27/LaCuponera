<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
   // session_start();

//Incluyendo controladores
include_once 'Controller/clientController.php';
include_once 'Controller/companiesController.php';
include_once 'Controller/offersController.php';
include_once 'Controller/userController.php';
include_once 'Controller/sesionController.php';
include_once 'Controller\carController.php';
include_once 'Controller\cuponController.php';
include_once 'Controller\recuperarContraController.php';


define('BASEPATH',true);

$url = $_SERVER['REQUEST_URI'];

$url = explode("/",$url);
$controller = empty($url[2])?"index":$url[2];
$controller.="Controller";
$fileController = "Controller/$controller.php";
$method = empty($url[3])?"index":$url[3];
$param = empty($url[4])?"":$url[4];

if(!is_file($fileController)){
    echo "
        <div class='alert alert-danger' role='alert'>
            Error 404 1
        </div>
    ";
    exit;
}

$controlador = new $controller();
if(!method_exists($controlador,$method)){
    echo "
        <div class='alert alert-danger' role='alert'>
            Error 404 2
        </div>
    ";
    exit;
}

$controlador->$method($param);

?>