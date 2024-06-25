<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../lib/sweetalert2/sweetalert2.css">
	<script src="../lib/sweetalert2/sweetalert2.min.js"></script>
</head>

<body>
    <?php require "./modulos/navbar.php" ?>
    <table class="table">
        <thead>
            <tr>
                <th scope="col"># Pedido</th>
                <th scope="col">Fecha</th>
                <th scope="col">Referencia</th>
                <th scope="col">Monto</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody id="table">
            <?php
            if (isset($_SESSION['usuario'])) {
                require "../php/conn.php";
                $stmt = $conn->prepare("SELECT id_factura, fecha, referencia, total FROM factura WHERE
                cedula_usuario = (SELECT Cedula FROM usuarios WHERE Usuario = ?) AND pagado = 0");
                $stmt->bind_param('s', $_SESSION['usuario']);
                $stmt->execute();
                $stmt->bind_result($id, $fecha, $referencia, $total);
                while ($stmt->fetch()) {
                    echo "
            <tr>
              <th scope='row'>{$id}</th>
              <td>{$fecha}</td>
              <td>{$referencia}</td>
              <td>{$total}</td>
              <td><div class='btn btn-success' onclick='manejarPedido({$id})'>Opciones</div></td>
            </tr>
            ";
                }
            }
            ?>
        </tbody>
    </table>
</body>
<script src="./js/manejarPedidos.js"></script>
</html>