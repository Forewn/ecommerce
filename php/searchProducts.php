<?php
$name = $_GET['name'];

require "conn.php";

// Preparar la consulta
$stmt = $conn->prepare("SELECT * FROM productos WHERE nombre LIKE ?");

// Establecer el valor del parámetro
$nameParam = $name . "%";

// Vincular el parámetro
$stmt->bind_param("s", $nameParam);

// Ejecutar la consulta
$stmt->execute();

// Obtener los resultados
$productos = array();
$result = $stmt->get_result();
while ($producto = $result->fetch_assoc()) {
    array_push($productos, $producto);
}

// Liberar recursos
$stmt->close();

// Codificar los resultados en JSON
echo json_encode($productos);
?>