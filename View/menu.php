<nav class="navbar navbar-expand-lg sticky-top" style="background-color: #7D2972;">

    <?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    ?>
    <?php
    if (isset($_SESSION['user']['idUsuario'])) {


    ?>
        <div class="container-fluid">
            <a class="navbar-brand listElement" href="/LaCuponera/View/index.php" style="font-family: Smack Boom;">La Cuponera |</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container-fluid">
                    <ul class="navbar-nav list d-flex">
                        <li class="nav-item">
                            <a class="nav-link listElement" aria-current="page" href="/LaCuponera/View/index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" aria-current="page" href="/LaCuponera/offers/">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/car/verCarrito/">Carrito de compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/cupon/index/<?php echo $_SESSION["cliente"]["idCliente"]?>">Historial de compras</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/sesion/cerrarSesion/">Cerrar sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/user/getDataUser/<?php echo $_SESSION['user']['idUsuario'] ?>">Mi perfil</a>
                        </li>
                        <div class="col align-self-end">
                            <li class="nav-item">
                                <a class="nav-link  listElement" data-bs-toggle="dropdown">Usuario: <?php echo $_SESSION['user']['Nombre'] ?> </a>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    <?php
    } else {

    ?>
        <div class="container-fluid">
            <a class="navbar-brand listElement" href="/LaCuponera/View/index.php" style="font-family: Smack Boom;">La Cuponera |</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="container-fluid">
                    <ul class="navbar-nav list d-flex">
                        <li class="nav-item">
                            <a class="nav-link listElement" aria-current="page" href="/LaCuponera/View/index.php">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" aria-current="page" href="/LaCuponera/offers/">Ofertas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/View/newClient.php">Registrate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link listElement" href="/LaCuponera/View/login.php">Inicio de sesión</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
</nav>