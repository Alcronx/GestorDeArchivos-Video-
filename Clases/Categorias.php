<?php

    require_once "Conexion.php";

    class Categorias  extends Conectar
    {
        public function agregarCategoria($datos){
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO t_categorias (id_usuario,nombre) VALUES (?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param("is", $datos['idUsuario'],$datos['categoria']);

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }

        public function eliminarCategoria($idCategoria){

            $conexion = Conectar::conexion();

            $sql = "DELETE FROM t_categorias where id_categorias = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("i", $idCategoria);

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        }

        public function obtenerCategoria($idCategoria){

            $conexion = Conectar::conexion();

            $sql = "Select id_categorias,nombre from t_categorias where id_categorias = '$idCategoria'";

            $result = mysqli_query($conexion, $sql);

            $categoria = mysqli_fetch_array($result);

            $datos = array(
                "idCategoria" => $categoria['id_categorias'],
                "nombreCategoria" => $categoria['nombre']
            );

            return $datos;

        }

        public function actualizarCategoria($Datos){

            $conexion = Conectar::conexion();

            $sql = "UPDATE t_categorias set nombre = ? where id_categorias = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("si", $Datos['categoria'],
                                $Datos['idCategoria']);

            $respuesta = $query->execute();
            $query->close();
            

            return $respuesta;

        }
    }
    
?>