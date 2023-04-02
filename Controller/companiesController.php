<?php

require_once 'Controller.php';
require_once './Model/companies.php';
require_once './Model/validator.php';

class CompaniesController extends Controller{
    private $model;

    function __construct(){
        $this->model = new Companies();
    }

    public function index(){     
        $viewBag = array();
        $empresas = $this->model->get();
        $viewBag['empresas'] = $empresas;  
        $this->render("index.php",$viewBag);
    }
}   
?>