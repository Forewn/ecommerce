<?php
    require "./usuario.php";

    $usuario =  new Usuario($_POST['usuario'], $_POST['contra']);
    $usuario->login();