<?php

require_once 'Controller.php';
require_once './Model/car.php';
require_once './Model/offers.php';
require_once './Model/validator.php';

class CarController extends Controller{
    
    private $model;
    private $modelOffer;

    function __construct(){
        $this->model = new Carrito();
        $this->modelOffer = new Offers();
    }

    public function verCarrito()
    {
        $this->render('carrito.php');
    }

    public function reiniciar()
    {
        if(isset($_SESSION["carrito"]))
        {
            if(count($_SESSION["carrito"])>0)
            {
                echo "<div class='alert alert-primary' role='alert'>
                            La lista de productos ha sido actualizada
                        </div>";
                unset($_SESSION["carrito"]);
            }
            else
            {
                echo "<div class='alert alert-primary' role='alert'>
                    No hay productos en el carrito</div>";
            }
        }
        else
        {
            echo "<div class='alert alert-primary' role='alert'>
            No hay productos en el carrito</div>";
        }
    }

    public function agregarPromo()
    {
        if(isset($_POST['btnAgregar']))
        {
            extract($_POST);
            $errores = array();
            $carrito = new Carrito();


            if($cantidad > 0)
            {   
                $existencia = $this->modelOffer->getCantidadOferta($idPromocion);

                if($existencia[0]['cantidad'] >= $cantidad)
                {   

                    if(isset($_SESSION["carrito"][$titulo]))
                    {
                        if(count($_SESSION["carrito"])>0)
                        {
                            foreach($_SESSION["carrito"] as $indice => $arreglo)
                            {
                                $idPromo = $_SESSION["carrito"][$indice]["idPromocion"];

                                if($idPromo == $idPromocion)
                                {
                                    
                                    $newCantidad = $_SESSION["carrito"][$indice]["cantidad"] + $cantidad;

                                    if($existencia[0]['cantidad'] >=  $newCantidad)
                                    {
                                        $carrito->agregarPromo($titulo,$cantidad,$precio,$idPromocion);
                                        $_SESSION['producto_agregado_message'] = "El producto ha sido agregado correctamente";
                                        header("Location:/LaCuponera/offers/index/");
                                    }
                                    else
                                    {
                                        $_SESSION['cantidad_error_message'] = "Cantidad ingresada es superior a las existencias";
                                        header("Location:/LaCuponera/offers/index/");
                                    }
                                }                              
                            }
                        }
                    }
                    else
                    {
                        $carrito->agregarPromo($titulo,$cantidad,$precio,$idPromocion);
                        $_SESSION['producto_agregado_message'] = "El producto ha sido agregado correctamente";
                        header("Location:/LaCuponera/offers/index/");
                    }
                }
                else
                {
                    $_SESSION['cantidad_error_message'] = "Cantidad ingresada es superior a las existencias";
                    header("Location:/LaCuponera/offers/index/");
                }
            }
            else
            {
                $_SESSION['error_cantidad_message'] = "La cantidad de promociones debe de ser mayor a cero";
                header("Location:/LaCuponera/offers/index/");
            }
        }
    }

    public function crearFactura()
    {
        if(isset($_SESSION["carrito"]))
        {
            if(count($_SESSION["carrito"])>0)
            {                    
                $totalProductos = count($_SESSION["carrito"]);
                $factura = array();
                $idCliente = $this->model->getIdCliente($_SESSION["user"]["idUsuario"]);
                $factura['idCliente'] =   $idCliente[0]['idCliente'];
                $factura['total'] = $this->model->calcularTotal();

                $this->model->insertarFactura($factura);
                $this->insertarDetalle();
                //$this->reiniciar();
            }
            else
            {
                    echo "<div class='alert alert-primary' role='alert'>
                            La lista de productos se ha actualizado
                        </div>";
            }
            }
        else
        {
                echo "<div class='alert alert-primary' role='alert'>No hay productos agregados</div>";
        }
    }


    public function generarCupon($idDetalle,$cantidad,$promo)
    {
        $codigoEmpresa = $this->model->getCodigoEmpresa($promo);
        $codigoCupones = array();
        for($i = 0; $i<= $cantidad; $i++)
        {
            $digits = 5;

            //generamos un número aleatorio
            $numero_aleatorio = rand(pow(10,$digits-1),pow(10,$digits)-1);
            $token = $numero_aleatorio . substr($dui,0,4);
        }
    }



    public function insertarDetalle()
    {
            if(isset($_SESSION["carrito"]))
            {
                if(count($_SESSION["carrito"])>0)
                {
                    foreach($_SESSION["carrito"] as $indice => $arreglo)
                    {
                        $cantidad = $_SESSION["carrito"][$indice]["cantidad"];
                        $idPromocion = $_SESSION["carrito"][$indice]["idPromocion"];
                        $idFactura = $this->model->getIdFactura($_SESSION["cliente"]["idCliente"]);

                        $detalle = array();
                        $detalle['cantidad'] = $cantidad;
                        $detalle['idPromocion'] = $idPromocion;
                        $detalle['idFactura'] = $idFactura[0]["Factura"];

                        $this->model->insertarDetalle($detalle);

                        //RESTAR CANTIDAD A PROMOCION
                        $promo = array();
                        $promo["cantidad"] = $cantidad;
                        $promo["idPromocion"] = $idPromocion;
                        

                        $idDetalle= $this->model->getIdDetalle($idFactura[0]["Factura"]);

                        $this->generarCupon($idDetalle[0]["idDetalleFactura"],$cantidad,$promo);

                        $this->model->actualizarCantidadPromo($promo);
                    }
                }
                else
                {
                    echo "<div class='alert alert-primary' role='alert'>
                            La lista de productos se ha actualizado
                        </div>";
                }
            }
            else
            {
                echo "<div class='alert alert-primary' role='alert'>No hay productos agregados</div>";
            }
    }
}
?>