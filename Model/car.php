<?php
require_once 'model.php';
    class Carrito extends Model
    {
        private $total;
        private $model;
        public function Carrito()
        {
            $this->total = 0;
        }
        public function agregarPromo($promocion,$cantidad,$precio,$idPromocion)
        {
            if($promocion != "" && $cantidad != "")
            {
                if(isset($_SESSION["carrito"]))
                {
                    $verifica=true;
                    foreach($_SESSION["carrito"] as $indice =>$valor)
                    {
                        if($promocion==$indice)
                        {
                            echo "<div class='alert alert-primary' role='alert'>
                            Cantidad aumentada
                        </div>";
                            $_SESSION["carrito"][$promocion]["cantidad"]+=$cantidad;
                            $verifica=false;
                            //$this->mostrar();
                            //$this->calcular();
                            break;
                        }
                    }
                    if($verifica==true)
                    {
                        echo "<div class='alert alert-primary' role='alert'>
                            Producto agregado
                        </div>";
                        $_SESSION["carrito"][$promocion]["cantidad"]=$cantidad;
                        $_SESSION["carrito"][$promocion]["precio"]=$precio;
                        $_SESSION["carrito"][$promocion]["idPromocion"]=$idPromocion;
                        //$this->mostrar();
                        //$this->calcular();
                    }
                }
                else
                {
                    echo "<div class='alert alert-primary' role='alert'>
                            Producto agregado
                        </div>";
                    $_SESSION["carrito"][$promocion]["cantidad"]=$cantidad;
                    $_SESSION["carrito"][$promocion]["precio"]=$precio;
                    $_SESSION["carrito"][$promocion]["idPromocion"]=$idPromocion;
                    //$this->mostrar();
                    //$this->calcular();
                }
            }
            else
            {
                echo "Campos vacios";
            }
        }


        public function calcularTotal()
        {
            $total = 0;
            if(isset($_SESSION["carrito"]))
            {
                if(count($_SESSION["carrito"])>0)
                {
                    foreach($_SESSION["carrito"] as $indice => $valor)
                    {
                        $total = $total + ($valor["cantidad"] * $valor["precio"]);
                    }
                }
                else
                {
                    echo "Los productos han sido eliminados del carrito";
                }
            }
            else
            {
                echo  "No hay productos registrados en el carrito";
            }
            return $total;
        }

        public function getIdCliente($idCliente)
        {
            $query ="SELECT idCliente FROM usuario inner join cliente on usuario.idUsuario = cliente.dui where usuario.estado = 1 and usuario.idUsuario = :id";
            return $this->getQuery($query,['id'=>$idCliente]);
        }

        public function insertarFactura($factura=array())
        {
            $query = "INSERT INTO factura VALUES (NULL, now(),:total, :idCliente)";
            return $this->setQuery($query,$factura);
        }

        public function calcular()
        {
            $total;
            if(isset($_SESSION["carrito"]))
            {
                if(count($_SESSION["carrito"])>0)
                {
                    
                    foreach($_SESSION["carrito"] as $indice => $valor)
                    {
                        $this->total = $this->total + ($valor["cantidad"] * $valor["precio"]);
                    }
                    $total = "<h5>Total: $ $this->total </h5>";
                }
                else
                {
                    $total = "Los productos han sido eliminados del carrito";
                }
            }
            else
            {
                $total = "No hay productos registrados en el carrito";
            }
        }
}