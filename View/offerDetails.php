<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        include 'cabecera.php'
    ?>
    <title>Detalle de oferta | La Cuponera</title>
</head>
<body style="background-color: beige;">
    <?php
        include 'menu.php';

        if(is_null($_SESSION['user'])){
            header('location:/LaCuponera/View/index.php');
        }
        
    ?>

    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px">
        <div class="card">
            <div class="card-body">               
                <h5 class="card-title text-center">Detalle de promoción</h5>
                <hr>
                <?php
                    foreach($oferta as $of){
                        echo "
                        <div class='row'>
                                <div class='container d-flex justify-content-center'>
                                    <img src='/LaCuponera/View/assets/img/".$of['Imagen']."' height='300px' width='300px'>
                                </div>
                            </div>
                            <div class='row'>
                                <h5><b>Empresa: </b>".$of['Empresa']."</h5>
                            </div>
                            <div class='row'>
                                <h5><b>Nombre de promoción: </b>".$of['titulo']."</h5>
                            </div>
                            <div class='row'>
                                <h5><b>Descripción: </b>".$of['descripcion']."</h5>
                            </div>
                            <div class='row'>
                                <h5><b>Precio ($): </b>".$of['precio']."</h5>
                            </div>
                            <div class='row'>
                                <form action='' method='POST'>                        
                                    <label for='cantidad' class='form-label'><h5><b>Cantidad de promociones</b></h5></label>
                                    <input type='number' class='form-control' id='cantidad' name='cantidad' placeholder='Ingrese cantidad de promociones'> 
                                    <div class='row d-flex justify-content-center'>                            
                                        <button type='submit' class='btn btn-success' name='registrar' style='margin-top:10px; width:1000px'>Agregar al carrito</button>										                    
                                    </div>
                                </form>
                            </div>
                        
                        ";
                    }
                ?>
                
            </div>
        </div>
    </div>    
    <?php
        require 'footer.php';
    ?>
</body>
</html>