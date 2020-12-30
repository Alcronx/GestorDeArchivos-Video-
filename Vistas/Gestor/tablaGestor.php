<?php
    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['id_usuarios'];
    $sql = "SELECT 
                    archivos.id_archivos as idArchivo,
                    usuario.nombre_usuarios as nombreUsuario,
                    categorias.nombre as categoria,
                    archivos.nombre as nombreArchivo,
                    archivos.tipo as tipoArchivo,
                    archivos.ruta as rutaArchivo,
                    archivos.fecha as fecha
            FROM
                    t_archivos AS archivos
            INNER JOIN
                    t_usuarios AS usuario ON archivos.id_usuario = usuario.id_usuarios
            INNER JOIN
                    t_categorias AS categorias ON archivos.id_categoria = categorias.id_categorias
            and usuario.id_usuarios='$idUsuario'";

    $result = mysqli_query($conexion,$sql);
?>

<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover" id="TablaGestorDatatable">
                <thead class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">Categoria</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Extension de archivo</th>
                        <th scope="col">Descargar</th>
                        <th scope="col">Visualizar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>


                <?php

                            /*
                             extensiones arreglo
                            */

                            $extensionesValidas = array('png','jpg','pdf','mp3','mp4');


                            while($mostrar = mysqli_fetch_array($result)){
                                $rutaDescarga = "../Archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
                                $nombreArchivo = $mostrar['nombreArchivo'];
                                $idArchivo = $mostrar['idArchivo'];
                ?>
                    <tr style="text-align: center;">
                        <td><?php echo $mostrar['categoria'];?></td>
                        <td><?php echo $mostrar['nombreArchivo'];?></td>
                        <td><?php echo $mostrar['tipoArchivo'];?></td>
                        <td>
                        <a href="<?php echo $rutaDescarga;?>" download="<?php echo $nombreArchivo;?>" class="btn btn-success btn-sm"> 
                            <span class="fas fa-download"></span>
                        </a>
                        </td>
                        <td>
                            <?php
                                        for($i=0;$i < count($extensionesValidas); $i++){
                                            if($extensionesValidas[$i] == $mostrar['tipoArchivo']){
                            ?>

                                        <span class="btn btn-primary btn-sm" data-toggle="modal" data-target="#visualizarArchivo" onclick="obtenerArchivo('<?php echo $idArchivo ?>')">
                                        <span class="fas fa-eye"></span>
                                        </span>

                            <?php
                                            }
                                        }
                            ?>
                        </td>
                        <td style="text-align: center;">
                            <span class="btn btn-danger btn-sm" onclick="eliminarArchivo(<?php echo $idArchivo ?>)">
                                <span class="fas fa-trash-alt"></span>
                            </span>
                        </td>
                    </tr>
                    <?php
                            }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#TablaGestorDatatable').DataTable();
});
</script>