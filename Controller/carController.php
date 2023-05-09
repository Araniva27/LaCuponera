<?php

require_once 'Controller.php';
require_once './Model/car.php';
require_once './Model/offers.php';
require_once './Model/validator.php';
require_once './Model/correo.php';
//include 'generarPDF.php';

class CarController extends Controller
{

    private $model;
    private $modelOffer;
    private $modelCorreo;

    function __construct()
    {
        if(is_null($_SESSION['user'])){
            header('location:/LaCuponera/View/index.php');
        }

        $this->model = new Carrito();
        $this->modelOffer = new Offers();
        $this->modelCorreo = new Correo();
    }



    public function verCarrito()
    {
        $this->render('carrito.php');
    }

    public function reiniciar()
    {
        if (isset($_SESSION["carrito"])) 
        {
            if (count($_SESSION["carrito"]) > 0) 
            {
                echo "hola";
                unset($_SESSION["carrito"]);
            }
            header('location:/LaCuponera/View/carrito.php');
        }
        header('location:/LaCuponera/View/carrito.php');
    }

    public function agregarPromo()
    {
        if (isset($_POST['btnAgregar'])) {
            if(isset($_SESSION['user']))
            {
                extract($_POST);
                $errores = array();
                $carrito = new Carrito();

                if ($cantidad > 0) {
                    $existencia = $this->modelOffer->getCantidadOferta($idPromocion);

                    if ($existencia[0]['cantidad'] >= $cantidad) {

                        if (isset($_SESSION["carrito"][$titulo])) {
                            if (count($_SESSION["carrito"]) > 0) {
                                foreach ($_SESSION["carrito"] as $indice => $arreglo) {
                                    $idPromo = $_SESSION["carrito"][$indice]["idPromocion"];

                                    if ($idPromo == $idPromocion) {

                                        $newCantidad = $_SESSION["carrito"][$indice]["cantidad"] + $cantidad;

                                        if ($existencia[0]['cantidad'] >=  $newCantidad) {
                                            $carrito->agregarPromo($titulo, $cantidad, $precio, $idPromocion);
                                            $_SESSION['producto_agregado_message'] = "El producto ha sido agregado correctamente";
                                            header("Location:/LaCuponera/offers/index/");
                                        } else {
                                            $_SESSION['cantidad_error_message'] = "Cantidad ingresada es superior a las existencias";
                                            header("Location:/LaCuponera/offers/index/");
                                        }
                                    }
                                }
                            }
                        } else {
                            $carrito->agregarPromo($titulo, $cantidad, $precio, $idPromocion);
                            $_SESSION['producto_agregado_message'] = "El producto ha sido agregado correctamente";
                            header("Location:/LaCuponera/offers/index/");
                        }
                    } else {
                        $_SESSION['cantidad_error_message'] = "Cantidad ingresada es superior a las existencias";
                        header("Location:/LaCuponera/offers/index/");
                    }
                } else {
                    $_SESSION['error_cantidad_message'] = "La cantidad de promociones debe de ser mayor a cero";
                    header("Location:/LaCuponera/offers/index/");
                }
            }else{
                    $_SESSION['error_cantidad_message'] = "Debe de iniciar sesión para agregar al carrito";
                    header("Location:/LaCuponera/offers/index/");
            }
                
        }
    }

    public function crearFactura()
    {
        $errores = array();
        if (isset($_SESSION["carrito"])) 
        {
            if (isset($_POST['pagar'])) 
            {
                extract($_POST);

                if (empty($numTarjeta))
                {
                    array_push($errores, "El número de tarjeta no puede ser vacío.");
                }

                if (!validateVisa($numTarjeta)) 
                {
                    array_push($errores, "La tarjeta debe ser Visa.");
                } 
                
                /* if (!validateMastercard($numTarjeta)) {
                    array_push($errores, "La tarjeta debe ser Mastercard.");
                }*/

                if (empty($cvv)) {
                    array_push($errores, "El CVV no puede ser vacío.");
                }

                if (!validateCVV($cvv)) {
                    array_push($errores, "El CVV no cumple con el formato, deben ser 3 o 4 números.");
                }

                if (empty($vencimiento)) {
                    array_push($errores, "La fecha de vencimiento no puede ser vacía.");
                }

                if (!validateDateCard($vencimiento)) {
                    array_push($errores, "La fecha no cumple con el formato establecido MM/YYYY.");
                }

                if (count($errores) == 0) 
                {
                    if (count($_SESSION["carrito"]) > 0) 
                    {
                        $totalProductos = count($_SESSION["carrito"]);
                        $factura = array();
                        //$idCliente = $this->model->getIdCliente($_SESSION["user"]["id"]);
                        $idCliente = $this->model->getIdCliente($_SESSION["user"]["id"]);
                        $factura['idCliente'] =   $idCliente[0]['idCliente'];
                        $factura['total'] = $this->model->calcularTotal();

                        $this->model->insertarFactura($factura);
                        $this->insertarDetalle();

                        //GENERAR FACTURA
                        crearPDFFactura();
                        $this->modelCorreo->enviarFactura();


                        //Limpiamos el carrito y redireccionamos al index
                        unset($_SESSION["carrito"]);

                        //mensaje de exito
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
                    $viewBag = array();
                    $viewBag['errores'] = $errores;
                    $this->render('carrito.php', $viewBag);
                }
            }
        }
        else
        {
            $_SESSION['carrito_vacio'] = "No hay productos agregados al carrito";
            header("Location:/LaCuponera/view/carrito.php");
        }
    }


    public function generarCupon($promo, $cantidad)
    {
        $codigoEmpresa = $this->model->getCodigoEmpresa($promo);
        //mt_srand (time());
        $codigoCupones = array();
        for ($i = 0; $i < $cantidad; $i++) {
            //generamos un número aleatorio
            $digits = 7;
            $numero_aleatorio = rand(pow(10, $digits - 1), pow(10, $digits) - 1);
            $codigoCupones[$i] = $codigoEmpresa[0]["codigoEmpresa"] . "-" . $numero_aleatorio;
        }
        return $codigoCupones;
    }



    public function insertarDetalle()
    {        
        if (isset($_SESSION["carrito"])) {
            if (count($_SESSION["carrito"]) > 0) {
                foreach ($_SESSION["carrito"] as $indice => $arreglo) {
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
                    $cupones = $this->generarCupon($idPromocion, $cantidad);

                    $cupon = array();



                    foreach ($cupones as $indice => $valor) {
                        $cupon = array();
                        $cupon["idDetalleFactura"] = $detalle;
                        $cupon["codigo"] = $valor;
                        $this->model->insertarCupon($cupon);
                    }

                    $this->model->actualizarCantidadPromo($promo);
                }
            } else {
                echo "<div class='alert alert-primary' role='alert'>
                            La lista de productos se ha actualizado
                        </div>";
            }
        } else {
            echo "<div class='alert alert-primary' role='alert'>No hay productos agregados</div>";
        }
    }
}
