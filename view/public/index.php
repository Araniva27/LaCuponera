<?php
    require_once ('../../core/helpers/pagesHelper.php');
    PageHelper::Header('Home');
	 PageHelper::NavBar();
?>

<body style="background-color: beige">
   <main>
		<div class="container-fluid d-none d-sm-block" style="padding: 0">         
         <img src="../../resource/img/imgPrincipal4.jpg" class="img-fluid imgPrincipal" alt="Imagen principal">
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
                  <img src="../../resource/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="#" class="btn btn-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <img src="../../resource/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="#" class="btn btn-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
               <div class="card">
                  <img src="../../resource/img/polloCampero.png" class="card-img-top" alt="...">
                  <div class="card-body">
                     <h5 class="card-title">Pollo Campero</h5>
                     <p class="card-text">Conoce las promociones de Pollo Campero</p>
                     <div class = "d-flex justify-content-center">
                        <a href="#" class="btn btn-bd-primary" style="background-color: #7D2972; color : white">Ver promociones</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>  
      </div>
   </main>   
   <?php
      PageHelper::Footer();
   ?>  
</body>

<script src="../../resource/js/bootstrap.min.js"></script>
<script src="../../resource/js/popper.min.js"></script>
</html>