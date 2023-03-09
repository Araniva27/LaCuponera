<?php
	require_once ('../../core/helpers/pagesHelper.php');
	PageHelper::header('Login');
?>
<body style="background-color: #7D2972">
   <main>
		<div class="container" style = "height: 100%; width:100%">
			<div class="row justify-content-center">
				<div class="col-md-6">					
					<div class="card cardShadow" style = "margin-top: 30%; height: 400px; width:370px; margin-left: 17%;">
						<div class="card-body">
							<form id = "formLogin" name = "formLogin">
								<div class="row">									
									<h4 class = "text-center" style = "font-family: 'Smack Boom'; font-size:30px">La Cuponera</h4>									
									<hr>
									<h4 class = "text-center"><b>¡Bienvenido!</b></h4>
								</div>
								<div class="row">
									<div class="mb-3">
										<label for="usuario" class="form-label" style = "font-size: 19px">Usuario</label>
										<input type="text" class="form-control inputBorder" id="usuario" name = "usuario" placeholder="Ingrese usuario">
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
										<button type="button" class="btn btn-primary">Ingresar</button>
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
<script src="../../resource/js/bootstrap.min.js"></script>
</html>