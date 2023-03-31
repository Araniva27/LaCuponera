<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="../View/assets/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="<?php __DIR__?>/assets/css/bootstrap.min.css" rel="stylesheet">-->
    <!--<link href="/LaCuponera/View/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/LaCuponera/View/assets/css/styles.css" rel="stylesheet">-->
    <?php
        include 'cabecera.php';
    ?>
    <title>Registro | La Cuponera</title>
</head>
<header style="height: 100%; width: 100%; color:white; ">
    <h4 class = "text-start" style = "font-family: 'Smack Boom'; font-size:35px; margin-left:2%; margin-top:2%; ">La Cuponera</h4>									
</header>
<body style="background-color: #7D2972">
    <main>
        <?php
        //echo __DIR__;
            if(isset($errores)){

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
        <div class="container" style="height: 100%; width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-3">
                    <div class="card cardShadow" style = "margin-top: 15%; height: 525px; width:850px; margin-left:-15%">
                        <div class="card-body">
                            <form id="formNewClient" name="formNewClient" action = "/LaCuponera/client/add" method="POST">
                                <div class="row">									
									<h4 class = "text-center"><b>¡Regístrate!</b></h4>
                                    <hr>
								</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Nombres:</label>
                                            <input type="text" class="form-control inputBorder " id="nombres" name = "nombres" placeholder="Ingrese sus nombres" value = "<?= isset($cliente)?$cliente['nombres']:'' ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Apellidos:</label>
                                            <input type="text" class="form-control inputBorder" id="apellidos" name = "apellidos" placeholder="Ingrese sus apellidos" value = "<?= isset($cliente)?$cliente['apellidos']:'' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Teléfono:</label>
                                            <input type="text" class="form-control inputBorder" id="telefono" name = "telefono" placeholder="Ingrese su teléfono" value = "<?= isset($cliente)?$cliente['telefono']:'' ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Correo electrónico:</label>
                                            <input type="text" class="form-control inputBorder" id="correo" name = "correo" placeholder="Ingrese su correo electrónico" value = "<?= isset($cliente)?$cliente['correo']:'' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Dirección:</label>
                                            <input type="text" class="form-control inputBorder" id="direccion" name = "direccion" placeholder="Ingrese su dirección" value = "<?= isset($cliente)?$cliente['direccion']:'' ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">DUI:</label>
                                            <input type="text" class="form-control inputBorder" id="dui" name = "dui" placeholder="Ingrese su número de DUI" value = "<?= isset($cliente)?$cliente['dui']:'' ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Contraseña:</label>
                                            <input type="password" class="form-control inputBorder" id="contra" name = "contra" placeholder="Ingrese su contraseña">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Confirmar contraseña:</label>
                                            <input type="password" class="form-control inputBorder" id="contraRep" name = "contraRep" placeholder="Repita su contraseña">
                                        </div>
                                    </div>
                                </div>
                                <div class="container" style = "margin-top: 20px">
									<div class="row">									
										<button type="submit" class="btn btn-primary" name="registrar">Registrarse</button>
									</div>	
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>   
</body>

</html>