<?php
    include "../../clase/Auth.php";

    $usuario = $_POST['usuario'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $Auth = new Auth();

    if ($Auth->registrar($usuario,$password)) {
        header("location:../../index.php");
    }else{
        echo "<alert>No se pudo registrar</alert>";
    }

?>