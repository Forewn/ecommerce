<?php
    session_start();
    $referencia = htmlspecialchars($_POST['referencia']);

    if(isset($_SESSION['usuario'])){
        require "./conn.php";
        $stmt = $conn->prepare("UPDATE factura
                                SET referencia = ? 
                                WHERE id_factura = (
                                    SELECT c.id_factura 
                                    FROM factura c 
                                    JOIN usuarios u 
                                    ON c.cedula_usuario = u.Cedula 
                                    WHERE u.usuario = ?
                                    ORDER BY id_factura DESC
                                    LIMIT 1
                                );
                                ");
        $stmt->bind_param('ss', $referencia, $_SESSION['usuario']);
        $stmt->execute();
        $stmt->close();
        header('Location: ../pedidos.php');
    }
    else{
        header('Location: ../index.php');
    }