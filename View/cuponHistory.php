<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php
	include 'cabecera.php';
	?>
	<title>Cupones | La Cuponera</title>
</head>

<body style="background-color: beige;">
	<?php
	include 'menu.php';
	?>
	<main>
		<div class="container-fluid">
			<h1 class="text-center" style="color: #7D2972; margin-top:20px;">Historial de cupones</h1><hr>
			<div class="row ">
				<div class="col-lg-4 col-12">
					<a class="btn btn-success d-flex justify-content-center">Cupones disponibles</a>
				</div>
				<div class="col-lg-4 col-12">
					<a class="btn btn-primary d-flex justify-content-center">Cupones Canjeados</a>
				</div>
				<div class="col-lg-4 col-12">
					<a class="btn btn-secondary d-flex justify-content-center">Cupones vencidos</a>
				</div>
			</div>
		</div>
		

		<div class="container-fluid" style="margin-top: 20px;">
			<div class='row'>
				<div class='col-lg-12' style='margin-top:15px'>
					<div class='card'>
						<div class='card-body'>
							<div class='row'>
								<div class='col-8'>
									<h5 class='card-title'>Código cupón: </h5>
									<ul>
										<li style='font-size: 15px'><b>Título de la promoción:</b> ".$oferta['titulo']."</li>
										<li style='font-size: 15px'><b>Fecha inicio:</b> ".$oferta['descripcion']."</li>
										<li style='font-size: 15px'><b>Fecha fin:</b> ".$oferta['precio']."</li>
										<li style='font-size: 15px'><b>Estado:</b> Disponible</li>
									</ul>
									<a type='submit' class='btn btn-primary text-center' style='background-color: #7D2972; color : white; height: 37px; width:150px; font-size:17px; font-weight:bold;' href='/LaCuponera/offers/offerDetail/".$oferta[' idPromocion']."'>Generar PDF</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
</body>

</html>