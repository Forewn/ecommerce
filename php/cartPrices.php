<?php
session_start();
if (isset($_SESSION['usuario'])) {
    switch ($_GET['action']) {
        case 0:
            $usuario = $_SESSION['usuario'];
            require "conn.php";
            $stmt = $conn->prepare("UPDATE carritos c
                                    SET subtotal = (
                                        SELECT SUM(costo)
                                        FROM detalles_carrito dc
                                        WHERE dc.id_carrito IN (
                                            SELECT id_carrito
                                            FROM carritos ca
                                            WHERE ca.id_usuario = (
                                                SELECT Cedula
                                                FROM usuarios u
                                                WHERE u.Usuario = ?
                                            )
                                        )
                                    )");
            $stmt->bind_param("s", $_SESSION['usuario']);
            $stmt->execute();
            $stmt = $conn->prepare("SELECT subtotal 
                                    FROM carritos c 
                                    JOIN usuarios u 
                                    ON c.id_usuario = (
                                        SELECT Cedula 
                                        FROM usuarios
                                        WHERE usuario = ?
                                    )
                                    WHERE u.Cedula = c.id_usuario;
                                    ");
            $stmt->bind_param('s', $_SESSION['usuario']);
            $stmt->execute();
            $stmt->bind_result($subtotal);
            $stmt->fetch();
            echo $subtotal;
            break;
        case 1:
            $value = $_GET['value'];
            $code = $_GET['code'];
            require "conn.php";
            $stmt = $conn->prepare("UPDATE detalles_carrito dc
                                    JOIN productos p ON dc.id_producto = p.codigo_producto
                                    JOIN carritos c ON dc.id_carrito = c.id_carrito
                                    JOIN usuarios u ON c.id_usuario = u.Cedula
                                    SET dc.cantidad = ?,
                                        dc.costo = (? * p.precio)
                                    WHERE u.Usuario = ?
                                    AND dc.id_producto = ?;
                                    ");
            $stmt->bind_param('ddsi', $value, $value, $_SESSION['usuario'], $code);
            $stmt->execute();
            $stmt = $conn->prepare("SELECT costo 
                                    FROM detalles_carrito 
                                    WHERE id_producto = ? 
                                    AND id_carrito = (
                                        SELECT id_carrito 
                                        FROM carritos 
                                        WHERE id_usuario = (
                                            SELECT Cedula 
                                            FROM usuarios 
                                            WHERE Usuario = ?
                                        )
                                    )");
            $stmt->bind_param('is', $code, $_SESSION['usuario']);
            $stmt->execute();
            $stmt->bind_result($price);
            $stmt->fetch();
            echo $price;
            break;
    }
}