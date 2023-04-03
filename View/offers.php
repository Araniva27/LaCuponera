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
                <form method="POST" action="/LaCuponera/offers/buscarEmpresa/">
                    <h5 style="color: #7D2972; font-weight:bold;">Buscador</h5>
                    <div class="row">                        
                        <div class="col-8" style="width: 1000px">
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ingrese empresa a buscar..." name = "nombre">
                        </div>
                        <div class="col-2" style="padding:0; width: 160px">
                            <button type="submit" class="btn btn-primary text-center" style="background-color: #7D2972; color : white; height: 37px; width:150px; font-size:17px; font-weight:bold;" name="buscar" >Buscar</button>
                        </div>
                        
                        <div class="col-2" style="padding:0">
                            <a type="submit" class="btn btn-secondary text-center" style="color : white; height: 37px; width:150px; font-size:17px; font-weight:bold;" href="/LaCuponera/offers/">Mostrar todo</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>                    
                    
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="row">
                <?php      
                    if(is_array($ofertas) || count($ofertas) == 0){
                        foreach($ofertas as $oferta){
                            echo "
                            <div class='col-lg-6' style = 'margin-top:15px'>
                                <div class='card'>                        
                                    <div class='card-body'>                            
                                        <div class='row'>
                                            <div class='col-4'>
                                                <img src='/LaCuponera/View/assets/img/".$oferta['Imagen']."' class='card-img-top' alt='...' width='200px' height='200px'>
                                            </div>
                                            <div class='col-8'>
                                                <h3 class='card-title'>".$oferta['Empresa']."</h3>
                                                <ul>
                                                    <li style='font-size: 23px'><b>Título de la oferta:</b> ".$oferta['titulo']."</li>
                                                    <li style='font-size: 23px'><b>Descripción:</b> ".$oferta['descripcion']."</li>
                                                    <li style='font-size: 23px'><b>Precio ($):</b> ".$oferta['precio']."</li>
                                                </ul>                                       
                                                <a type='submit' class='btn btn-primary text-center' style='background-color: #7D2972; color : white; height: 37px; width:150px; font-size:17px; font-weight:bold; '>Seleccionar</a>                                        
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            ";
                        }
                    } else{
                        echo "No se han encontrado resultados";
                    }                             
                        

                ?>
            </div>
                
        </div>
    </main>
</body>

</html>