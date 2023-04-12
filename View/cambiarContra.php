<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
		include 'cabecera.php';
    ?>
    <title>Cambiar contraseña | La Cuponera</title>
</head>

<body style="background-color: #7D2972; height: 100%; width: 100%;">
<?php
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }   
	if(is_null($_SESSION['user']))
	{
		header('location:/LaCuponera/View/index.php');
	}
    if(isset($errores))
    {
        echo "
        <div class='container'>
        <div class='card'>
        <h5 class = 'text-center' style = 'margin-top:10px; margin-bottom: 0px'>¡Verificar!</h5>
        <div class='card-body'>
        <ul>";
        foreach($errores as $error)
        {
            echo "<li>".$error."</li>";
        }
                echo "</ul>
                            </div>
                        </div> 
                    </div>";                    
    }
    /*if(isset($_SESSION['error_actualizar_contra']))
    {
			?>
				<script>
					alertify.error('<?php echo  $_SESSION['error_actualizar_contra']?>');
				</script>
			<?php
			unset($_SESSION['error_actualizar_contra']);
    }*/
?>
<?php
if(isset($_SESSION['success_message']))
{
			?>
				<script>
					alertify.message('<?php echo  $_SESSION['success_message']?>');
				</script>
			<?php
			unset($_SESSION['success_message']);
}
?>

<main>
		<div class="container" style = "height: 100%; width:100%">
			<div class="row justify-content-center">
				<div class="col-md-6">					
					<div class="card cardShadow" style = "margin-top: 30%; height:450px; width:370px; margin-left: 17%;">
						<div class="card-body">
							<form id = "formLogin" name = "formLogin" action = "/LaCuponera/recuperarContra/cambiarContra" method="POST">
								<div class="row">									
									<h4 class = "text-center" style = "font-family: 'Smack Boom'; font-size:30px">La Cuponera</h4>									
									<hr>
									<h6 class = "text-center"><b>Cambio de contraseña</b></h6>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="usuario" class="form-label" style = "font-size: 15px">Contraseña actual:</label>
										<input type="password" required class="form-control inputBorder" id="contra" name = "contraActual" placeholder="Ingrese contraseña">
									</div>
								</div>	
								<div class="row">
									<div class="mb-3">
										<label for="usuario" class="form-label" style = "font-size: 15px">Contraseña nueva:</label>
										<input type="password" required class="form-control inputBorder" id="contra" name = "contraNueva1" placeholder="Ingrese contraseña">
									</div>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="usuario" class="form-label" style = "font-size: 15px">Confirme contraseña nueva</label>
										<input type="password" required class="form-control inputBorder" id="contra" name = "contraNueva2" placeholder="Ingrese contraseña">
									</div>
								</div>						
								<div class="container" style = "margin-top: 20px">
									<div class="row">									
										<button type="submit" class="btn btn-primary" name="btnCambiarContra">Cambiar contraseña</button>
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