<?php
session_start();
if (isset($_SESSION['usuario'])) {
    require "conn.php";
    $stmt = $conn->prepare("DELETE FROM detalles_carrito
                            WHERE id_carrito = (
                                SELECT c.id_carrito 
                                FROM carritos c 
                                WHERE c.id_usuario = (
                                    SELECT u.Cedula 
                                    FROM usuarios u 
                                    WHERE u.Usuario = ?
                                )
                            )
                            AND id_producto = ?;
                            ");
    $stmt->bind_param("si", $_SESSION['usuario'], $_GET['code']);
    $stmt->execute();
    $stmt = $conn->prepare("SELECT p.codigo_producto, p.nombre, p.descripcion, p.precio, p.foto_producto, d.cantidad 
									FROM detalles_carrito d 
									JOIN productos p
									ON d.id_producto = p.codigo_producto
									WHERE id_carrito = (
    									SELECT c.id_carrito FROM carritos c WHERE c.id_usuario = (
        									SELECT u.Cedula FROM usuarios u WHERE u.Usuario = ?
    									)
									)");
    $stmt->bind_param("s", $_SESSION['usuario']);
    $stmt->execute();
    $stmt->bind_result($codigo_producto, $nombre, $descripcion, $precio, $foto, $cantidad);
    $productos = array();
    while($stmt->fetch()){
        $producto = array(
            'codigo' => $codigo_producto,
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'precio' => $precio,
            'foto' => $foto,
            'cantidad' => $cantidad
        );

        array_push($productos, $producto);
    }

    echo json_encode($productos);
}

?>