<?php
    session_start();
    if (isset($_SESSION['usuario'])) {
        require "../../php/conn.php";
        $stmt = $conn->prepare("SELECT id_factura, fecha, referencia, total FROM factura WHERE
        cedula_usuario = (SELECT Cedula FROM usuarios WHERE Usuario = ?) AND pagado = 0");
        $stmt->bind_param('s', $_SESSION['usuario']);
        $stmt->execute();
        $stmt->bind_result($id, $fecha, $referencia, $total);
        $string = "";
        while ($stmt->fetch()) {
            $string += "
            <tr>
            <th scope='row'>{$id}</th>
            <td>{$fecha}</td>
            <td>{$referencia}</td>
            <td>{$total}</td>
            <td><div class='btn btn-success' onclick='manejarPedido({$id})'>Opciones</div></td>
            </tr>
            ";
        };
        echo $string;
    }
?>