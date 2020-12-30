<?php

require_once "Conexion.php";

    class Gestor extends Conectar
    {
        
        public function agregarRegistroArchivo($datos){
            $conexion = Conectar::conexion();

            $sql = "INSERT INTO t_archivos (id_usuario,
                                            id_categoria,
                                            nombre,
                                            tipo,
                                            ruta)
                                    VALUES(?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param ("iisss",   $datos['idUsuario'],
                                            $datos['idCategoria'],
                                            $datos['nombreArchivo'],
                                            $datos['tipo'],
                                            $datos['ruta']);

            $respuesta = $query-> execute();
            $query->close();
            return $respuesta;
        }
        
        public function obtenerNombreArchivo($idArchivo){
                $conexion = Conectar::conexion();
                $sql = "SELECT nombre
                        FROM t_archivos
                        Where id_archivos = '$idArchivo'";
                $result = mysqli_query($conexion, $sql);

                return mysqli_fetch_array($result)['nombre'];
        }


        public function eliminarArchivo($idArchivo){

            $conexion = Conectar::conexion();

            $sql = "DELETE FROM t_archivos where id_archivos = ?";

            $query = $conexion->prepare($sql);
            $query->bind_param("i", $idArchivo);

            $respuesta = $query->execute();
            $query->close();

            return $respuesta;

        }

        public function obtenerRutaArchivo($idArchivo){

            $conexion = Conectar::conexion();
            $sql = "SELECT nombre,tipo
                    FROM t_archivos
                    Where id_archivos = '$idArchivo'";
            $result = mysqli_query($conexion, $sql);
            $datos = mysqli_fetch_array($result);
            $nombreArchivo = $datos['nombre'];
            $extension = $datos['tipo'];

            return self::previsualizarArchivo($nombreArchivo,$extension );

        }

        public function previsualizarArchivo($nombre,$tipo){
            
            $idUsuario = $_SESSION['id_usuarios'];
            $ruta = "../Archivos/".$idUsuario."/".$nombre;
            $rutapdf = "https://dialnet.unirioja.es/descarga/articulo/5475216.pdf";

            switch ($tipo){
                case 'png':
                    return '<img src="'.$ruta.'" width="50%" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;">';
                    break;
                case 'jpg':
                    return '<img src="'.$ruta.'" width="50%" style="display: block;
                    margin-left: auto;
                    margin-right: auto;
                    width: 50%;">';
                    break;
                case 'pdf':
                   return "<iframe src='http://docs.google.com/gview?url=".$rutapdf."&embedded=true' style='width:600px; height:500px;' frameborder='0'></iframe>";
                    break;
                case 'mp3':
                    return '<audio  controls src="'.$ruta.'">
                            </audio>';
                    break;
                case 'mp4':
                        return '<video src ="'.$ruta.'" controls width="50%"></video>';
                    break;
                default:
                    break;
                }
                 
            

        }

    }
    

?>