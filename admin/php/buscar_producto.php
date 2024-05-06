<?php
    $input = htmlspecialchars($_GET['input']);

    include "../../php/conn.php";

    $sql = "SELECT a.codigo_producto, a.nombre, a.descripcion, a.precio, c.categoria, b.cantidad, a.foto_producto FROM productos a JOIN inventario b ON a.codigo_producto = b.codigo_producto JOIN categorias c ON c.id_categoria = a.id_categoria WHERE a.codigo_producto LIKE '$input%' OR a.nombre LIKE '$input%' OR a.descripcion LIKE '$input%' OR a.precio LIKE '$input%' OR c.categoria LIKE '$input%';";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        echo 0;
    }
    else{
        $productos = array();
        while($producto = $result->fetch_assoc()){
            $aux = array(
                'codigo' => $producto['codigo_producto'],
                'nombre' => $producto['nombre'],
                'descripcion' => $producto['descripcion'],
                'precio' => $producto['precio'],
                'categoria' => $producto['categoria'],
                'cantidad' => $producto['cantidad'],
                'foto' => $producto['foto_producto']
            );
            array_push($productos, $aux);
        }
        echo json_encode($productos);
    }
?>