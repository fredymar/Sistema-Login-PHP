<?php
    include "conexion.php";

    class Auth extends Conexion{

        public function registrar($usuario, $password){
            $conexion = parent::conectar();
            $sql = "INSERT INTO t_usuarios (usuario,password) VALUES (?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('ss', $usuario,$password);
            return $query->execute();
        }

        public function loguear($usuario, $password){
            $conexion = parent::conectar();
            $passwordexistente="";
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario'";
            $respuesta = mysqli_query($conexion,$sql);
            $passwordexistente = mysqli_fetch_array($respuesta)['password'];

            if (password_verify($password,$passwordexistente)) {
                $_SESSION['usuario'] = $usuario;
                return true;
            } else {
                return false;
            }
            
        }

    }
?>