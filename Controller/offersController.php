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
}


?>