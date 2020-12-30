<?php

    session_start();
    require_once "../../Clases/Gestor.php";
    $Gestor = new Gestor();
    $idArchivo = $_POST['idArchivo'];
    $idUsuario = $_SESSION['id_usuarios'];

    $nombreArchivo = $Gestor->obtenerNombreArchivo($idArchivo);
    $rutaEliminar = "../../Archivos/".$idUsuario."/".$nombreArchivo;

       
        if(unlink($rutaEliminar)){
            echo $Gestor->eliminarArchivo($idArchivo);
        }else{
            $Gestor->eliminarArchivo($idArchivo);
            echo 0;
        }
    

    

?>