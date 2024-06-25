<?php
require "./conn.php";
session_start();
$code = $_POST['code'];
$usuario = $_SESSION['usuario'];
$cedula = $conn->query("SELECT Cedula FROM usuarios WHERE usuario = '$usuario'")->fetch_assoc()['Cedula'];
$sql = "SELECT * FROM carritos WHERE id_usuario = '$cedula';";

$result = $conn->query($sql);
if ($result->num_rows == 0) {
    $sql = "INSERT INTO carritos(id_usuario, fecha_actualizacion) VALUES('$cedula', " . date('Y-m-d') . ");;";
    $result = $conn->query($sql);
    $sql = "INSERT INTO detalles_carrito(id_carrito, id_producto, cantidad, costo) VALUES ((SELECT id_carrito FROM carritos WHERE id_usuario = '$cedula'), '$code', 1, (detalles_carrito.cantidad * (SELECT precio FROM productos WHERE codigo_producto = '$code')))";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * FROM carritos WHERE id_usuario = '$cedula'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        $sql = "INSERT INTO carritos(id_usuario, fecha_actualizacion) VALUES('$cedula', " . date('Y-m-d') . ");";
        $result = $conn->query($sql);
        $sql = "INSERT INTO detalles_carrito(id_carrito, id_producto, cantidad, costo) VALUES ((SELECT id_carrito FROM carritos WHERE id_usuario = '$cedula'), '$code', 1, (detalles_carrito.cantidad * (SELECT precio FROM productos WHERE codigo_producto = '$code')))";
        $result = $conn->query($sql);
    } else {
        $sql = "INSERT INTO detalles_carrito(id_carrito, id_producto, cantidad, costo) VALUES ((SELECT id_carrito FROM carritos WHERE id_usuario = '$cedula'), '$code', 1, (detalles_carrito.cantidad * (SELECT precio FROM productos WHERE codigo_producto = '$code')))";
        $result = $conn->query($sql);
    }
}
