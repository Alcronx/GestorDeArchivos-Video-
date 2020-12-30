<?php

    session_start();
    require_once "../../../Clases/Usuario.php";

    $usuario = $_POST['Usuario'];
    $contraseña = $_POST['Contraseña'];
    
    $usuarioObj = new Usuario();
    echo $usuarioObj ->login($usuario,$contraseña);

?>