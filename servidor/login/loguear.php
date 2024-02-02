<?php session_start();
    include "../../clase/Auth.php";

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $Auth = new Auth();


    if ($Auth->loguear($usuario, $password)) {
        header("location: ../../inicio.php");
    } else {
        echo "<alert>No se pudo loguear</alert>";
    }
?>