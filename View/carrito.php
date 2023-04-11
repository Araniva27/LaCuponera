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
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }   
    if(isset($_SESSION['carrito_vacio']))
    {
		?>
			<script>
				alertify.message('<?php echo  $_SESSION['carrito_vacio']?>');
			</script>
		<?php
		unset($_SESSION['carrito_vacio']);
    }

    if(is_null($_SESSION['user']))
    {
        header('location:/LaCuponera/View/index.php');
    }
    ?>

    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Carrito de compras</h5>
                <hr>
                <?php
                    if (isset($_SESSION["carrito"])) 
                    {
                        $tabla = "";
                        if (count($_SESSION["carrito"]) > 0) 
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

                            foreach ($_SESSION["carrito"] as $indice => $arreglo) 
                            {
                                $tabla .= "<tr>";
                                $tabla .= "<td>" . $indice . "</td>";
                                foreach ($arreglo as $key => $valor) 
                                {
                                    if ($key != "idPromocion") 
                                    {
                                        if ($key == "precio")
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

                    //Calculo del total
                    $total = 0;
                    if (isset($_SESSION["carrito"])) 
                    {
                        if (count($_SESSION["carrito"]) > 0) 
                        {

                            foreach ($_SESSION["carrito"] as $indice => $valor) 
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
                ?>
                <?php
                if(isset($errores))
                {

                    echo "
                        <div class='container'>
                            <div class='card'>
                            <h5 class = 'text-center' style = 'margin-top:10px; margin-bottom: 0px'>¡Verificar!</h5>
                                <div class='card-body'>
                                    <ul>
                    ";
                            foreach($errores as $error){
                                    echo "<li>".$error."</li>";
                            }
                    echo "           
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    ";                    
                }
            
                ?>
                <a href="/LaCuponera/car/reiniciar/" class="btn btn-primary">Limpiar</a>
                <!-formulario de pago->
                    <form action="/LaCuponera/car/crearFactura/" method="POST">
                        <div class="container-fluid" style="margin-top: 20px; margin-bottom: 10px">
                            <div class="row" style="margin-bottom: 5px;">
                                <div class='col-lg-12 col-12'>
                                    <label for='tarjeta' class='form-label' style='font-size: 19px'>No. tarjeta</label>
                                    <input type='text' required class='form-control inputBorder' id='numTarjeta' name='numTarjeta' placeholder="0000000000000000">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-9 col-12">
                                    <label for='tarjeta' class='form-label' style='font-size: 19px'>Vencimiento</label>
                                    <input type="text" required class="form-control inputBorder" id="vencimiento" name="vencimiento" placeholder="MM/YYYY">
                                </div>
                                <div class="col-lg-3 col-12">
                                    <label for='cvv' class='form-label' style='font-size: 19px'>CVV</label>
                                    <input type="text" required class="form-control inputBorder" id="cvv" name="cvv" placeholder="0000">
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" name="pagar">Pagar</button>
                        <!--<button type="submit" href="/LaCuponera/car/crearFactura/" class="btn btn-primary">Pagar</button>-->
                    </form>
            </div>
        </div>
    </div>
    <?php
    require 'footer.php';
    ?>
</body>

</html>