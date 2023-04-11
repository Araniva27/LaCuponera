<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
		include 'cabecera.php';
    ?>
    <title>Login | La Cuponera</title>
</head>

<body style="background-color: #7D2972; height: 100%; width: 100%;">
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
<?php
	if(session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}   
	if(isset($_SESSION['success_message']))
	{
				?>
					<script>
						alertify.message('<?php echo  $_SESSION['success_message']?>');
					</script>
				<?php
				unset($_SESSION['success_message']);
	}
	if(isset($_SESSION['contra_nueva']))
	{
				?>
					<script>
						alertify.message('<?php echo  $_SESSION['contra_nueva']?>');
					</script>
				<?php
				unset($_SESSION['contra_nueva']);
	}
?>

<main>
		<div class="container" style = "height: 100%; width:100%">
			<div class="row justify-content-center">
				<div class="col-md-6">					
					<div class="card cardShadow" style = "margin-top: 30%; height: 450px; width:370px; margin-left: 17%;">
						<div class="card-body">
							<form id = "formLogin" name = "formLogin" action = "/LaCuponera/sesion/Iniciar" method="POST">
								<div class="row">									
									<h4 class = "text-center" style = "font-family: 'Smack Boom'; font-size:30px">La Cuponera</h4>									
									<hr>
									<h4 class = "text-center"><b>¡Bienvenido!</b></h4>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="correo" class="form-label" style = "font-size: 19px">Correo</label>
										<input type="email" class="form-control inputBorder" id="correo" name = "correo" placeholder="Ingrese correo">
									</div>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="contrasenia" class="form-label" style = "font-size: 19px">Contraseña</label>
										<input type="password" class="form-control inputBorder" id="contrasenia" name = "contra" placeholder="Ingrese contraseña">
									</div>
								</div>									
								<div class="container" style = "margin-top: 20px">
									<div class="row">									
										<button type="submit" class="btn btn-primary" name="iniciar">Ingresar</button>
									</div>
								</div>	
								<div class="container" style = "margin-top:10px">
									<div class="row">
										<div class ="col-12 text-center">
											¿No tienes cuenta? <a href="/LaCuponera/View/newClient.php/">Regístrate aquí</a>
										</div>
										<div class ="col-12 text-center">
											<a href="/LaCuponera/View/recuperarContra.php/">Olvide mi contraseña</a>
										</div>
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