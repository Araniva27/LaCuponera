<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      include 'cabecera.php'
    ?>
    <title>Home | La Cuponera</title>
</head>
<body style="background-color: beige">
   <?php
      include 'menu.php';
   ?>
   <main>
		<div class="container-fluid d-none d-sm-block" style="padding: 0">         
         <img src="assets/img/imgPrincipal4.jpg" class="img-fluid imgPrincipal" alt="Imagen principal">
      </div>
      <div class = "container-fluid" style="padding:10px">
         <div class="row">
           <div class="col-12 text-center">
               <h1 style = "color: #7D2972; font-family: Smack Boom;">La Cuponera</h1>
               <h2 style = "color: #7D2972">¡Bienvenido a La Cuponera!</h2>
               <h3 style = "color: #7D2972">Encuentras los mejores cupones de descuento para tus lugares favoritos en un solo lugar</h3>
               <h3 style = "color: #7D2972">¡Comienza a explorar!</h3>
           </div>
         </div>
         <div class="linea"></div>
      </div>     
      
      <div class="container-fluid">
         <div class="row text-center">
            <h3 style = "color:#7D2972">Conoce las ofertas de las empresas asociadas</h3>
         </div>   
         <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <img src="assets/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="offersCompany.php" class="btn btn-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <img src="assets/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="offersCompany.php" class="btn btn-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <img src="assets/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="offersCompany.php" class="btn btn-bd-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>  
      </div>
   </main>   
   <?php
      include 'footer.php';
   ?> 
</body>

<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/popper.min.js"></script>
</html>