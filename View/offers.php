<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include 'cabecera.php';
    ?>
    <title>ofertas | La Cuponera</title>
</head>

<body style="background-color: beige;">
    <?php
    include 'menu.php';
    ?>
    <main>
        <div class="container-fluid">
            <h1 class="text-center" style="color: #7D2972; margin-top:20px;">Ofertas</h1>
        </div>
        <div class="container-fluid">
            <div class="row" style="margin-top: 20px;">
                <form method="POST" action="#">
                    <h5 style="color: #7D2972; font-weight:bold;">Buscador</h5>
                    <div class="row">
                        <div class="col-10">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ingrese empresa a buscar...">
                        </div>
                        <div class="col-2">
                            <a type="submit" class="btn btn-primary text-center" style="background-color: #7D2972; color : white; height: 37px; width:150px; font-size:17px; font-weight:bold; ">Buscar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="card">
                <img src="assets/img/polloCampero.png">
                <div class="card-body">
                    <h1 class="card-title">Pollo campero</h1>
                </div>
            </div>
        </div>
    </main>
</body>

</html>