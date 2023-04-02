<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php 
      include 'cabecera.php';            
    ?>
    <title>Home | La Cuponera</title>
</head>

<body style="background-color: beige">
   <?php
      include 'menu.php';      
   ?>
   <main>
		<div class="container-fluid d-none d-sm-block" style="padding: 0">         
         <img src="/LaCuponera/View/assets/img/imgPrincipal4.jpg" class="img-fluid imgPrincipal" alt="Imagen principal">
      </div>
      <div class="container-fluid" style="padding:10px">
         <div class="row">
            <div class="col-12 text-center">
               <h1 style="color: #7D2972; font-family: Smack Boom;">La Cuponera</h1>
               <h2 style="color: #7D2972">¡Bienvenido a La Cuponera!</h2>
               <h3 style="color: #7D2972">Encuentras los mejores cupones de descuento para tus lugares favoritos en un solo lugar</h3>
               <h3 style="color: #7D2972">¡Comienza a explorar!</h3>
            </div>
         </div>
         <div class="linea"></div>
      </div>     
      
      <div class="container-fluid">        
         <div class="row text-center">
            <h3 style="color:#7D2972">Conoce las ofertas...</h3>
         </div>
         <div class="row">
            <form action="/LaCuponera/offers/" method="POST">
               <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-primary text-center" style="background-color: #7D2972; color : white; height: 50px; width:200px; font-size:20px; ">Ver promociones</button>
               </div>
            </form>
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