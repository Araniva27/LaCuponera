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
        <div class="container" style="height: 100%; width:100%">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card cardShadow" style="margin-top: 40%; height: 300px; width:450px; margin-left: 17%;">
                        <div class="card-body">
                            <form id="formValidateCode" name="formValidateCode">
                                <div class="row" style="margin-bottom: 10px;">
                                    <h4 class="text-center" style="font-family: 'Smack Boom'; font-size:30px; color:#7D2972">La Cuponera</h4>
                                    <hr>
                                    <h4 class="text-center" style="color:#7D2972"><b>Ingresa el código enviado a tu correo</b></h4>
                                </div>
                                <div class="row">
									<div class="mb-3">
										<input type="text" class="form-control inputBorder" id="codigo" name = "codigo" placeholder="Ingrese su código">
									</div>
								</div>
                                <div class="container" style = "margin-top: 20px">
									<div class="row">									
										<a href = "#" type="button" class="btn btn-primary">Verificar</a>
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