<?php
require_once "Conexion.php";

class Usuario extends Conectar{


public function login($usuario,$password){

    $conexion = Conectar::conexion();

    $sql = "SELECT count(*) as existeUsuario from t_usuarios where nombre_usuarios = '$usuario' and password = MD5('$password')";

    $result = mysqli_query($conexion,$sql);

    $respuesta = mysqli_fetch_array($result)['existeUsuario'];

    if ($respuesta > 0){
        $_SESSION['usuario'] = $usuario;

        $sql = "SELECT id_usuarios from t_usuarios where nombre_usuarios = '$usuario' and password =  MD5('$password')";

        $result = mysqli_query($conexion, $sql);
        $idUsuario = mysqli_fetch_row($result)[0];

        $_SESSION['id_usuarios'] = $idUsuario;

        return 1;
    }else{
        return 0;
    }


}

}
?>