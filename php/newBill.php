<?php
session_start();
if (isset($_SESSION['usuario'])) {
    $tasa = $_POST['tasa'];
    require "./conn.php";

    // Primer statement
    $stmt = $conn->prepare("SELECT id_carrito FROM carritos WHERE id_usuario = (SELECT Cedula FROM usuarios WHERE Usuario = ?)");
    $stmt->bind_param('s', $_SESSION['usuario']);
    $stmt->execute();
    $stmt->bind_result($carrito);
    $stmt->fetch();
    $stmt->close();

    // Segundo statement
    $stmt = $conn->prepare("INSERT INTO factura (cedula_usuario, total, fecha) SELECT id_usuario, (subtotal * ?), fecha_actualizacion FROM carritos WHERE id_usuario = (SELECT Cedula FROM usuarios WHERE Usuario = ?)");
    $stmt->bind_param('ds', $tasa, $_SESSION['usuario']);
    $stmt->execute();
    $factura = $conn->insert_id;
    $stmt->close();
    $fecha = date('Y-m-d');
    $stmt = $conn->prepare("UPDATE factura
                            SET fecha = ?
                            WHERE id_factura = ?");
    $stmt->bind_param('si', $fecha, $factura);
    $stmt->execute();
    $stmt->close();

    // Tercer statement
    $stmt = $conn->prepare("INSERT INTO detalles_factura (id_factura, id_producto, cantidad, costo) SELECT ?, id_producto, cantidad, (costo * ?) FROM detalles_carrito WHERE id_carrito = ?");
    $stmt->bind_param('idd', $factura, $tasa, $carrito);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM detalles_carrito WHERE id_carrito = ?");
    $stmt->bind_param('i', $carrito);
    $stmt->execute();
    $stmt->close();

    $stmt = $conn->prepare("DELETE FROM carritos WHERE id_carrito = ?");
    $stmt->bind_param('i', $carrito);
    $stmt->execute();
    $stmt->close();

    echo 1;
}
?>
