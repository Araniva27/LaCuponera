<?php

require_once 'Controller.php';
require_once './Model/car.php';
require_once './Model/validator.php';

class CarController extends Controller{
    
    private $model;

    function __construct(){
        $this->model = new Carrito();
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

            /*echo $precio . "<br>";
            echo $idPromocion . "<br>";
            echo $cantidad . "<br>";*/
            $carrito = new Carrito();
            /*if(is_int($cantidad))
            {*/
                if($cantidad > 0)
                {
                    $carrito->agregarPromo($titulo,$cantidad,$precio,$idPromocion);
                    $_SESSION['producto_agregado_message'] = "El producto ha sido agregado correctamente";
                    header("Location:/LaCuponera/offers/index/");
                }
                else
                {
                    $_SESSION['error_cantidad_message'] = "La cantidad de promociones debe de ser mayor a cero";
                    header("Location:/LaCuponera/offers/index/");
                }
        /* }
            else
            {
                $_SESSION['error_entero_message'] = "La cantidad de promociones debe de ser entera";
                header("Location:/LaCuponera/offers/index/");
            }*/
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
                $factura['idCliente'] =   $idCliente[0]['idCliente'];;
                $factura['total'] = $this->model->calcularTotal();

                $this->model->insertarFactura($factura);
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