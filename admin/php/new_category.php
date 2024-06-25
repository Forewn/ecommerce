<?php

    $nombre = $_GET['categoria'];

    include "./categoria_clase.php";
    $categoria = new Categoria();

    $categoria->createCategoria($nombre);