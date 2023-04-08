<?php

require_once 'Controller.php';
require_once './Model/cupon.php';
require_once './Model/validator.php';
require_once './Model/correo.php';

class CuponController extends Controller{
    
    private $model;

    function __construct()
    {
        $this->model = new Cupon();
    }

    public function index($idCliente)
    {     
        $viewBag = array();
        $cupones = $this->model->getCuponesDisponibles($idCliente);
        $viewBag['cupones'] = $cupones;  
        $this->render("cuponHistory.php",$viewBag);
    }

    public function cuponesCanjeados($idCliente)
    {
        $viewBag = array();
        $cupones = $this->model->getCuponesCanjeados($idCliente);
        $viewBag['cupones'] = $cupones;  
        $this->render("cuponHistory.php",$viewBag);
    }

    public function cuponesVencidos($idCliente)
    {
        $viewBag = array();
        $cupones = $this->model->getCuponesVencidos($idCliente);
        $viewBag['cupones'] = $cupones;  
        $this->render("cuponHistory.php",$viewBag);
    }

}
?>