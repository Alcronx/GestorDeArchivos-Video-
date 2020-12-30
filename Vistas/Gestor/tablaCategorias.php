<?php 
    session_start();
    require_once "../../Clases/Conexion.php";
    $idUsuario = $_SESSION['id_usuarios'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();


?>


<div class="row">
    <div class="col-sm-12"> 
        <div class="table-responsive">
            <table class="table table-hover" id="TablaGestorDatatable">
                <thead  class="thead-dark">
                    <tr style="text-align: center;">
                        <th scope="col">Nombre</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                     $sql = "Select id_categorias,nombre,fechaInsert from t_categorias where id_usuario = '$idUsuario'";
                     $result = mysqli_query($conexion,$sql);

                     while ($mostrar = mysqli_fetch_array($result)){
                         $idCategoria = $mostrar['id_categorias'];
                    ?>
                    <tr style="text-align: center;">
                        <td><?php echo $mostrar['nombre'];?></td>
                        <td><?php echo $mostrar['fechaInsert'];?></td>
                        <td >
                        <span class="btn btn-warning btn-sm">
                                <span class="fas fa-edit" onclick="obtenerDatosCategoria('<?php echo $idCategoria?>')"
                                data-toggle="modal" data-target="#modalActualizarCategoria">
                                </span>    
                            </span>
                        </td>
                        <td >
                            <span class="btn btn-danger btn-sm">
                                <span class="fas fa-trash-alt" onclick="eliminarCategoria('<?php echo $idCategoria?>')" ></span>    
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
    $(document).ready(function(){
        $('#TablaGestorDatatable').DataTable();
    });
</script>