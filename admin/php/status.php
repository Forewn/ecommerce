<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        require "../../php/conn.php";
        $codigo = $_GET['code'];

        switch ($_GET['action']) {
            case '1':
                $status = 1;
                break;
            default:
                $status = 2;
                break;
        }
        $stmt = $conn->prepare("UPDATE factura
                                SET pagado = ?
                                WHERE id_factura = ?");
        $stmt->bind_param("ii", $status, $codigo);
        $stmt->execute();
        $stmt->close();
        echo 1;
    }