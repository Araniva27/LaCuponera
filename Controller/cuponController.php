<?php

require_once 'Controller.php';
require_once './Model/cupon.php';
require_once './Model/validator.php';
require_once './Model/correo.php';
include 'generarPDF.php';


class CuponController extends Controller
{
    
    private $model;

    function __construct()
    {
        if(is_null($_SESSION['user'])){
            header('location:/LaCuponera/View/index.php');
        }
        
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

    public function generarPDFCupones($idCupon)
    {
        $arregloCupon = array();
        $cupon = $this->model->getCupon($idCupon);
        $arregloCupon['cupones'] = $cupon;
        crearPDFCupones($arregloCupon);
    }

}
?>