<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include 'cabecera.php'
    ?>
    <title>Carrito de compras | La Cuponera</title>
</head>
<body style="background-color: beige;">
    <?php
        include 'menu.php';
    ?>

    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px">
        <div class="card">
            <div class="card-body">               
                <h5 class="card-title text-center">Carrito de compras</h5>
                <hr>
                <?php
                    if(isset($_SESSION["carrito"]))
                    {
                        $tabla = "";
                        if(count($_SESSION["carrito"])>0)
                        {
                            $tabla = "<table class='table table-borderer'>";
                            $tabla .= "<thead>";
                            $tabla .= "<tr>";
                            $tabla .= "<th scope='col' colspan='6' class='text-center'>" . "Total de promociones: " . count($_SESSION["carrito"]) . "</th>";
                            $tabla .= "</tr>";
                            $tabla .= "<tr class='bg-succes'>";
                            $tabla .= "<th scope='col'>Promocion</th>";
                            $tabla .= "<th scope='col'>Cantidad cupones</th>";
                            $tabla .= "<th scope='col'>Precio</th>";
                            $tabla .= "</tr>";
                            $tabla .= "</thead>";
        
                            foreach($_SESSION["carrito"] as $indice => $arreglo)
                            {
                                $tabla .= "<tr>";
                                $tabla .= "<td>" . $indice . "</td>";
                                foreach($arreglo as $key => $valor)
                                {
                                    if($key!="idPromocion")
                                    {
                                        if($key=="precio")
                                        {
                                            $tabla .= "<td>$" . $valor . "</td>";
                                        } 
                                        else
                                        {
                                            $tabla .= "<td>" . $valor . "</td>";
                                        }
                                    }
                                }
                                $tabla .= "</tr>";
                            }
                            $tabla .= "</table></center>";
                        }
                        else
                        {
                            $tabla .= "<div class='alert alert-primary' role='alert'>
                                    La lista de productos se ha actualizado
                                </div>";
                        }
                    }
                    else
                    {
                        $tabla = "<div class='alert alert-primary' role='alert'>No hay productos agregados</div>";
                    }
                    echo $tabla;

                    $total = 0;
                    if(isset($_SESSION["carrito"]))
                    {
                        if(count($_SESSION["carrito"])>0)
                        {
                            
                            foreach($_SESSION["carrito"] as $indice => $valor)
                            {
                                $total = $total + ($valor["cantidad"] * $valor["precio"]);
                            }
                            echo "<h5>Total: $ $total </h5>";
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
                ?>
                <a href="/LaCuponera/car/reiniciar/" class="btn btn-primary">Limpiar</a>
                <!-formulario de pago->
                
                <a href="/LaCuponera/car/crearFactura/" class="btn btn-primary">Pagar</a>
            </div>
        </div>
    </div>    
    <?php
        require 'footer.php';
    ?>
</body>
</html>