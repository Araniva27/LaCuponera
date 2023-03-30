<?php

//Incluyendo controladores
include_once 'Controller/clientController.php';

session_start();
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