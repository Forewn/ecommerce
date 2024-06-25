<?php

    class Categoria{
        private $nombre;

        public function createCategoria($nombre){
            $this->nombre = $nombre;
            require "../../php/conn.php";
            $sql = "INSERT INTO categorias(id_categoria, categoria) VALUE({$this->generateCode()}, '{$this->nombre}')";
            if($conn->query($sql)){
                return 0;
            }
            else{
                return 1;
            }
        }

        public function getCategories(){
            require "../../php/conn.php";
            $sql = "SELECT * FROM categorias;";
            $result = $conn->query($sql);
            $categorias = array();
            while($categoria = $result->fetch_assoc()){
                $arreglo = array(
                    'id' => $categoria['id_categoria'], 
                    'categoria' => $categoria['categoria']
                );
                array_push($categorias, $arreglo);
            }
            echo json_encode($categorias);
        }

        private function generateCode(){
            require "../../php/conn.php";
            $sql = "SELECT id_categoria FROM categorias ORDER BY id_categoria DESC LIMIT 1;";
            $result = $conn->query($sql);
            return $result->fetch_assoc()['id_categoria'] + 1;
        }
    }