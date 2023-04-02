<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      include 'cabecera.php'
    ?>
    <title>Login | La Cuponera</title>
</head>

<body style="background-color: #7D2972; height: 100%; width: 100%;">
<?php
	if(isset($_SESSION['success_message'])){	
		
?>
	<script>
		swal("¡Registro exitoso!", "Ingresa con tus datoss", "success");
	</script>
<?php
	unset($_SESSION['success_message']);
	} 
?>
   <main>
		<div class="container" style = "height: 100%; width:100%">
			<div class="row justify-content-center">
				<div class="col-md-6">					
					<div class="card cardShadow" style = "margin-top: 30%; height: 400px; width:370px; margin-left: 17%;">
						<div class="card-body">
							<form id = "formLogin" name = "formLogin" action = "/LaCuponera/">
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
										<input type="password" class="form-control inputBorder" id="contrasenia" name = "contrasenia" placeholder="Ingrese contraseña">
									</div>
								</div>									
								<div class="container" style = "margin-top: 20px">
									<div class="row">									
										<a href = "index.php" type="button" class="btn btn-primary">Ingresar</a>
									</div>	
								</div>	
								<div class="container" style = "margin-top:10px">
									<div class="row">
										<div class ="col-12 text-center">
											¿No tienes cuenta? <a href="#">Regístrate aquí</a>
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