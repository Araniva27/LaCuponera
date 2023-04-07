<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'cabecera.php';
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    ?>
    <title>Mi perfil | La Cuponera</title>
</head>

<body style="background-color: beige; height:100%">
    <?php
    include 'menu.php';
        if(isset($_SESSION['success_message_updateinfo'])){       
    ?>
    <script>
        alertify.success('<?php echo  $_SESSION['success_message_updateinfo']?>');
    </script>
    <?php
        }
        unset($_SESSION['success_message_updateinfo']);
    ?>
    <?php
        if(isset($_SESSION['errores'])){            
            echo "
                <div class='container'>
                    <div class='card'>
                    <h5 class = 'text-center' style = 'margin-top:10px; margin-bottom: 0px'>¡Verificar!</h5>
                        <div class='card-body'>
                            <ul>
            ";
                    foreach($_SESSION['errores'] as $error){
                            echo "<li>".$error."</li>";
                    }
            echo "           
                            </ul>
                        </div>
                    </div> 
                </div>
            ";             
        }
        unset($_SESSION['errores']);
    ?>

    <div class="container-fluid" style="margin-top:20px; margin-bottom:20px">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title text-center">Mi perfil</h5>
                <hr>

                <?php 
                //var_dump($datos);

                foreach($datos as $data)
                {
                    echo "
                    <form id='formLogin' name='formLogin' action='/LaCuponera/client/updateClientData/' method='POST'>
                        <div class='row'>
                            <div class='col-lg-6 col-12'>
                                <label for='nombresU' class='form-label' style='font-size: 19px'>Nombres</label>
                                <input type='text' class='form-control inputBorder' id='nombres' name='nombres' value='".$data['nombres']."'>
                            </div>
                            <div class='col-lg-6 col-12'>
                                <label for='apellidosU' class='form-label' style='font-size: 19px'>Apellidos</label>
                                <input type='text' class='form-control inputBorder' id='apellidos' name='apellidos' value='".$data['apellidos']."'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-6 col-12'>
                                <label for='correo' class='form-label' style='font-size: 19px'>Correo</label>
                                <input type='email' class='form-control inputBorder' id='correo' name='correo' value='".$data['correo']."' readonly> 
                            </div>
                            <div class='col-lg-6 col-12'>
                                <label for='direccionU' class='form-label' style='font-size: 19px'>Dirección</label>
                                <input type='text' class='form-control inputBorder' id='direccion' name='direccion' value='".$data['direccion']."'>
                            </div>
                        </div>
                        <div class='row'>
                            <div class='col-lg-6 col-12'>
                                <label for='duiU' class='form-label' style='font-size: 19px'>DUI</label>
                                <input type='text' class='form-control inputBorder' id='dui' name='dui' value='".$data['dui']."' readonly>
                            </div>
                            <div class='col-lg-6 col-12'>
                                <label for='telU' class='form-label' style='font-size: 19px'>Telefono</label>
                                <input type='text' class='form-control inputBorder' id='telefono' name='telefono' value='".$data['tel']."'>
                            </div>
                        </div>
                        <div class='container' style='margin-top: 20px'>
                            <div class='row'>
                                <button type='submit' class='btn btn-primary' name='modificar'>Modificar</button>
                            </div>
                        </div>
                    </form>

                    
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