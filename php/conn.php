<?php
    
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "tienda";

    $conn = new mysqli($host, $username, $password, $db);
    if($conn->connect_errno){
        echo "fallo la conexion a la base de datos" . $conexion->connect_errno;
    }