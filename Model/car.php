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

        public function insertarDetalle($detalle=array())
        {
            $query = "INSERT INTO detalleFactura VALUES (NULL, :idFactura,:idPromocion, :cantidad)";
            return $this->setQuery($query,$detalle);
        }
        public function actualizarCantidadPromo($promo=array())
        {
            $query = "UPDATE promocion SET cantidad = (cantidad - :cantidad) where idPromocion = :idPromocion";
            return $this->setQuery($query,$promo);
        }

        public function getIdFactura($idCliente)
        {
            $query = "SELECT MAX(idFactura) as Factura FROM factura where idCliente = :id";
            return $this->getQuery($query,['id'=>$idCliente]);
        }

        public function getIdDetalle($idFactura)
        {
            $query = "SELECT MAX(idDetalleFactura) as idDetalleFactura FROM detalleFactura where idFactura = :id";
            return $this->getQuery($query,['id'=>$idFactura]);
        }

        public function getCodigoEmpresa($idPromo)
        {
            $query = "SELECT codigoEmpresa FROM empresa INNER JOIN promocion ON empresa.idEmpresa = promocion.idEmpresa WHERE idPromocion = :id";
            return $this->getQuery($query,['id'=>$idPromo]);
        }

        public function insertarCupon($cupon=array())
        {
            $query = "INSERT INTO cupon VALUES (NULL, :codigo,1, :idDetalleFactura)";
            return $this->setQuery($query,$cupon);
        }
}