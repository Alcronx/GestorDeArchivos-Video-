<?php

    session_start();

    require_once "../../Clases/Categorias.php";

    $Categorias = new Categorias();

    $datos = array ( "idUsuario" => $_SESSION['id_usuarios'],
                      "categoria" => $_POST['categoria']);


    echo $Categorias->agregarCategoria($datos);


?>