<?php
    require_once('../../core/helpers/pagesHelper.php');
    PageHelper::header('Registro de clientes');
?>
<header style="height: 100%; width: 100%; color:white; ">
    <h4 class = "text-start" style = "font-family: 'Smack Boom'; font-size:35px; margin-left:2%; margin-top:2%; ">La Cuponera</h4>									
</header>
<body style="background-color: #7D2972">
    <main>
        <div class="container" style="height: 100%; width: 100%;">
            <div class="row justify-content-center">
                <div class="col-md-6 col-sm-3">
                    <div class="card cardShadow" style = "margin-top: 15%; height: 525px; width:850px; margin-left:-15%">
                        <div class="card-body">
                            <form id="formNewClient" name="formNewClient">
                                <div class="row">									
									<h4 class = "text-center"><b>¡Regístrate!</b></h4>
                                    <hr>
								</div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Nombres:</label>
                                            <input type="text" class="form-control inputBorder " id="nombres" name = "nombres" placeholder="Ingrese sus nombres">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Apellidos:</label>
                                            <input type="text" class="form-control inputBorder" id="apellidos" name = "apellidos" placeholder="Ingrese sus apellidos">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Teléfono:</label>
                                            <input type="text" class="form-control inputBorder" id="telefono" name = "telefono" placeholder="Ingrese su teléfono">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Correo electrónico:</label>
                                            <input type="text" class="form-control inputBorder" id="correo" name = "correo" placeholder="Ingrese su correo electrónico">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">Dirección:</label>
                                            <input type="text" class="form-control inputBorder" id="direccion" name = "direccion" placeholder="Ingrese su dirección">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="usuario" class="form-label" style = "font-size: 15px">DUI:</label>
                                            <input type="text" class="form-control inputBorder" id="dui" name = "dui" placeholder="Ingrese su número de DUI">
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
										<button type="button" class="btn btn-primary">Registrarse</button>
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