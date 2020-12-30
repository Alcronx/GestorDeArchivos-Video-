<?php

    session_start();
    require_once "../../Clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['id_usuarios'];

    echo $Gestor->obtenerRutaArchivo($idArchivo);
    

    

?>