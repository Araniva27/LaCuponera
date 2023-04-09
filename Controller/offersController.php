<?php

require_once 'Controller.php';
require_once './Model/offers.php';
require_once './Model/Validator.php';

class OffersController extends Controller{
    
    private $model;

    function __construct()
    {
        

        $this->model = new Offers();
    }

    public function index(){
        $viewBag = array();
        $ofertas = $this->model->get();
        $viewBag['ofertas'] = $ofertas;
        $this->render("offers.php", $viewBag);
    }

    public function buscarEmpresa(){     
        if(isset($_POST['buscar'])){
            extract($_POST);           
            $datos = $this->model->get($nombre);
            $viewBag['ofertas'] = $datos;
            $this->render("offers.php", $viewBag); 
        }      
    }

    public function offerDetail($idPromo)
    {
        $viewBag = array();
        $oferta = $this->model->getOfferDetail($idPromo);
        $viewBag['oferta'] = $oferta;
        $this->render("offerDetails.php", $viewBag);
    }
}


?>