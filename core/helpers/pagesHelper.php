<?php

class PageHelper{
    public static function Header($title){
      print '   
          <!DOCTYPE html>
          <html lang="en">
          <head>
              <meta charset="UTF-8">
              <meta http-equiv="X-UA-Compatible" content="IE=edge">
              <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <link href="../../resource/css/bootstrap.min.css" rel="stylesheet">
			  <link href="../../resource/css/styles.css" rel="stylesheet">    
              <title>'.$title.' | La Cuponera</title>
          </head>			 
      ';
    }

    	public static function NavBar(){
        print '
            <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #7D2972;">
               <div class="container-fluid">
						<a class="navbar-brand listElement" href="index.php" style = "font-family: Smack Boom;">La Cuponera |</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<div class = "container-fluid">
								<ul class="navbar-nav list d-flex" >
									<li class="nav-item">
										<a class="nav-link listElement" aria-current="page" href="#">Inicio</a>
									</li>
									<li class="nav-item">
										<a class="nav-link listElement" href="#">Carrito de compras</a>
									</li>
									<li class="nav-item">
										<a class="nav-link listElement" href="#">Historial de compras</a>
									</li>
									<li class="nav-item">
										<a class="nav-link listElement" href="#">Registraste</a>
									</li>
									<li class="nav-item">
										<a class="nav-link listElement" href="login.php">Inicio de sesión</a>
									</li>	
									<li class="nav-item">
										<a class="nav-link listElement" href="#">Cerrar sesión</a>
									</li>		
									<div class="col align-self-end">
										<li class="nav-item">
											<a class="nav-link  listElement">Usuario: Manuel Araniva </a>
										</li>	
								 	</div>							
								</ul>							
							</div>
               	</div>               
            </nav>
        ';
    }

	 public static function Footer(){
		print '
			<footer class="bg-dark text-center text-white" style = "margin-top: 35px;">  
				<div class="text-center p-3" style="background-color: #7D2972">
					© 2023 Copyright         
				</div>
			</footer>
		';
	 }
}    

?>