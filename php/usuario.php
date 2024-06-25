<?php
    class Usuario{
        private $nombre, $apellido, $cedula, $usuario, $email, $password;

        function __construct($usuario, $password){
            $this->password = htmlspecialchars($password);
            $this->usuario = htmlspecialchars($usuario);
        }

        function signUp($nombre, $apellido, $cedula, $email){
            $this->nombre = htmlspecialchars($nombre);
            $this->apellido = htmlspecialchars($apellido);
            $this->cedula = htmlspecialchars($cedula);
            $this->email = htmlspecialchars($email);
            $this->password =  password_hash(htmlspecialchars($this->password), PASSWORD_DEFAULT);
            require "./conn.php";
            $result = $this->checkIfExists($conn);
            if($result->num_rows == 0){
                $sql = "INSERT INTO usuarios(Cedula, Nombre, Apellido, Usuario, Email, Contrasena, Ultima_conexion, id_cargo) 
                VALUES('{$this->cedula}', '{$this->nombre}', '{$this->apellido}', '{$this->usuario}', '{$this->email}', '{$this->password}', '".date("Y-m-d H:i:s")."', '0')";
                if($conn->query($sql)){
                    header("Location: ../admin/index.php");
                }
            }
            else{
                header("Location: ../admin/index.php");
            }
            }
            
            function checkIfExists($conn){
                $sql = "SELECT * FROM usuarios WHERE Usuario = '{$this->usuario}';";
                return $conn->query($sql);
            }
    
            function login(){
                if(isset($_SESSION['usuario'])){
                    header("Location: ../admin/home.php");
                }
                else{
                    require "./conn.php";
                    $result = $this->checkIfExists($conn);
                    if($result){
                        $usuario = $result->fetch_assoc();
                        if(password_verify($this->password, $usuario['Contrasena'])){
                            session_start();
                            $_SESSION['usuario'] = $this->usuario;
                            // if($usuario['id_cargo'] == 1){
                                header("Location: ../admin/home.php");
                            // }
                            // else{
                            //     // en caso de ser cliente
                            //     header('Location: ../index.php');
                            // }
                        }
                        else{
                            echo "Contrasena incorrecta";
                        }
                    }
                    else{
                        echo "Usuario no existe";
                    }
                }
            }
        }