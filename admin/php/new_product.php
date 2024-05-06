<?php

    require "./producto_clase.php";

    $producto = new Producto(
        htmlspecialchars($_POST['codigo']),
        htmlspecialchars($_POST['nombre']),
        htmlspecialchars($_POST['descripcion']),
        htmlspecialchars($_POST['precio']),
        htmlspecialchars($_POST['categoria']),
        $_FILES['foto']
    );