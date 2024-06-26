<?php 
    session_start();
?>
<link rel="stylesheet" href="css/bootstrap.min.css">
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="../index.php">Tienda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav p-2 p-lg-0 ms-lg-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./home.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Pedidos
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./pedidos.php">Pendientes</a></li>
                    <li><a class="dropdown-item" href="./procesados.php">Procesados</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Productos
                    </a>
                    <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./productos.php">Nuevo Producto</a></li>
                    <li><a class="dropdown-item" href="./inventario.php">Inventario</a></li>
                    <li><a class="dropdown-item" href="./categorias.php">Categorias</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./php/logout.php">Cerrar sesion</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="./js/bootstrap.bundle.min.js"></script>