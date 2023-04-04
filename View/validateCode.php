<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'cabecera.php'
    ?>
    <title>Validar código | La Cuponera</title>
</head>

<body style="background-color: #7D2972; height: 100%; width: 100%">
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
                        foreach($errores as $error)
                        {
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
        <div class="container" style="height: 100%; width:100%">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card cardShadow" style="margin-top: 40%; height: 400px; width:450px; margin-left: 17%;">
                        <div class="card-body">
                            <form id="formValidateCode" name="formValidateCode" action = "/LaCuponera/User/verificar/" method="POST">
                                <div class="row" style="margin-bottom: 10px;">
                                    <h4 class="text-center" style="font-family: 'Smack Boom'; font-size:30px; color:#7D2972">La Cuponera</h4>
                                    <hr>
                                    <h4 class="text-center" style="color:#7D2972"><b>Ingresa el código enviado a tu correo</b></h4>
                                </div>
                                <div class="row"  style="margin-bottom: 10px;">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Correo electrónico:</label>
                                            <input type="text" class="form-control inputBorder" id="correo" name = "correo" placeholder="Ingrese su correo electrónico" value = "<?= isset($cliente)?$cliente['correo']:'' ?>">
                                        </div>
                                </div>
                                <div class="row">
									<div class="mb-3">
                                    <label for="usuario" class="form-label" style = "font-size: 15px">Token:</label>
										<input type="text" class="form-control inputBorder" id="codigo" name = "token" placeholder="Ingrese su token">
									</div>
								</div>
                                <div class="container" style = "margin-top: 20px">
                                    <div class="row">									
										<button type="submit" class="btn btn-primary" name="verificar">Verificar</button>
									</div>	
								</div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </main>
</body>
<script src="../../../resource/js/bootstrap.min.js"></script>

</html>