<?php

class Producto{
    private $nombre, $codigo, $descripcion, $precio, $foto, $categoria, $extension;

    function __construct($codigo, $nombre, $descripcion, $precio, $categoria, $foto){
        require "../../php/conn.php";
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->foto = $foto;

        $this->checkIfExists($conn);
    }

    private function saveProduct($conn){
        $upload_folder = "images/productos/";

        if($this->setPhoto() == 1){
            $foto = $upload_folder.$this->foto.".".$this->extension;
            $sql = "INSERT INTO productos(codigo_producto, nombre, descripcion, precio, foto_producto, top, id_categoria) VALUES
            ('{$this->codigo}', '{$this->nombre}', '{$this->descripcion}', '{$this->precio}', '{$foto}', 1, '{$this->categoria}')";
            if($conn->query($sql)){
                $sql = "SELECT * FROM inventario;";
                $num = $conn->query($sql)->num_rows;
                $sql = "INSERT INTO inventario (id_inventario_discreto, codigo_producto, cantidad) 
                VALUES('{$num}', '{$this->codigo}', 1);";
                $conn->query($sql);
            }

        }
    }

    private function checkIfExists($conn){
        $sql = "SELECT * FROM productos WHERE codigo_producto = '{$this->codigo}'";
        if($conn->query($sql)->num_rows){
            $this->warning();
        }else{
            $this->saveProduct($conn);
        }
    }

    private function warning(){
        echo "Error";
    }

    private function setPhoto(){

        $upload_folder = "../../images/productos/";
        $uploaded_file = $this->foto;
        $filename = $this->codigo; // Use the code for filename

        if ($uploaded_file['error'] === 0) {
            $allowedExtensions = ['jpeg', 'png', 'jpg'];
            $extension = pathinfo($this->foto['name'], PATHINFO_EXTENSION);

            if (!in_array($extension, $allowedExtensions)) {
                echo "Error: Solo se permiten las extensiones: " . implode(', ', $allowedExtensions);
                exit();
            }

            // Generate filename with code and extension
            $file_path = realpath($upload_folder) . DIRECTORY_SEPARATOR . $filename . '.' . $extension;

            if (move_uploaded_file($uploaded_file['tmp_name'], $file_path)) {
                // Image saved successfully (return value or handle as needed)
                $this->foto = $filename;
                $this->extension = $extension;
                return 1; // Or your preferred success indicator
            } else {
                echo "Error al mover el archivo a la carpeta de destino";
            }
        } else {
            echo "Error durante la subida del archivo";
        }
    }
}