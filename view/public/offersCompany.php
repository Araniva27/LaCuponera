<?php
    require_once ('../../core/helpers/pagesHelper.php');
    PageHelper::Header('Promociones');
    PageHelper::NavBar();
?>
<body style = "background-color: beige;">
   <div class = "container-fluid">
		<div class="container">
			<div class="row text-center" style = "margin-top: 10px;">
				<div class="card cartaTitulo">
					<div class="card-body">
						<h3 style = "padding: 0;">Promociones de pollo campero</h3>
					</div>
				</div>
			</div>
		</div>
   </div>
	<div class = "container" style = "margin-top:10px">		
		<div class="row">
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header">
						<b>Título de la promoción</b>
					</div>
					<div class="card-body">
						<p class="card-text">Descripción de la promoción</p>
						<div class = "d-flex justify-content-center">
							<button type = "button" class="btn btn-primary btnMorado" data-bs-toggle = "modal" data-bs-target = "#modalCantidad" onclick="modalQuantityOffer()">Seleccionar promoción</button>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<div class="card">
					<div class="card-header">
						<b>Título de la promoción</b>
					</div>
					<div class="card-body">						
						<p class="card-text">Descripción de la promoción</p>
						<div class = "d-flex justify-content-center">
							<button type = "button" class="btn btn-primary btnMorado" data-bs-toggle = "modal" data-bs-target = "#modalCantidad" onclick="modalQuantityOffer()">Seleccionar promoción</button>
						</div>
					</div>
				</div>
			</div>
		</div>		
	</div>
	<?php
		PageHelper::Footer();
	?>
	<!--Modal para seleccion de cantida de cupones-->
	<div class="modal fade" id="modalCantidad" tabindex="-1" aria-labelledby="modalCantidadPromociones" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Ingreso de cantidad de promociones</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id = "frmCantidad">
						<div class="row">
							<p><b>Promoción:</b> Titulo de la promoción</p>
						</div>
						<div class="row">
							<div class="col-auto">
								<label for="cantidad" class="col-form-label"><b>Cantidad:</b></label>
							</div>
							<div class="col-8">
								<input type="number" id="cantidad" name = "cantidad" class="form-control" aria-describedby="CantidadPromociones" placeholder="Ingrese cantidad de promociones">
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary btnMorado">Aceptar</button>
				</div>
			</div>
		</div>	
	</div>	
</body>

</html>