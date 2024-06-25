<?php
    $input = htmlspecialchars($_GET['input']);
    include "../../php/conn.php";
    $sql = "SELECT id_categoria, categoria FROM categorias WHERE id_categoria like '{$input}%' or categoria like '{$input}%';";
    $result = $conn->query($sql);
    if($result->num_rows == 0){
        echo 0;
    }
    else{
        $categorias = array();
        while($categoria = $result->fetch_assoc()){
            $aux = array(
                'id' => $categoria['id_categoria'],
                'categoria' => $categoria['categoria']
            );
            array_push($categorias, $aux);
        }
        echo json_encode($categorias);
    }