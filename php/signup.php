<?php
    require "./usuario.php";

    $usuario = new Usuario($_POST['usuario'], $_POST['password']);
    $usuario->signUp($_POST['nombre'], $_POST['apellido'], $_POST['cedula'], $_POST['correo']);

