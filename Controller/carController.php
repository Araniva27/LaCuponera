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
                //header("Location:/LaCuponera/View/index.php");
            }
            else
            {
                /*echo "<div class='alert alert-primary' role='alert'>
                    No hay productos en el carrito</div>";*/
            }
        }
        else
        {
            //header("Location:/LaCuponera/View/index.php");

            /*echo "<div class='alert alert-primary' role='alert'>
            No hay productos en el carrito</div>";*/
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
                $this->reiniciar();
                 //GENERAR FACTURA
                $_SESSION['compra_exitosa_message'] = "Su compra ha sido realizada correctamente. Revise su correo";
                header("Location:/LaCuponera/offers/index");
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


    public function generarCupon($promo,$cantidad)
    {
        $codigoEmpresa = $this->model->getCodigoEmpresa($promo);
        //mt_srand (time());
        $codigoCupones = array();
        for($i = 0; $i< $cantidad; $i++)
        {
            //generamos un número aleatorio
            $digits = 7;
            $numero_aleatorio = rand(pow(10, $digits-1), pow(10, $digits)-1);
            $codigoCupones[$i] = $codigoEmpresa[0]["codigoEmpresa"] ."-". $numero_aleatorio;
        }
        return $codigoCupones;
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
                        

                        $idDetalle = $this->model->getIdDetalle($idFactura[0]["Factura"]);

                        $detalle = $idDetalle[0]["idDetalleFactura"];


                        //Se generan los cupones y se guardan en un arreglo
                        $cupones = $this->generarCupon($idPromocion,$cantidad);

                        $cupon = array();
                        


                        foreach($cupones as $indice => $valor)
                        {
                            $cupon = array();
                            $cupon["idDetalleFactura"] = $detalle;
                            $cupon["codigo"] = $valor;
                            $this->model->insertarCupon($cupon);
                        }

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