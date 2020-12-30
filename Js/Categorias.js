function agregarCategoria() {
    var categoria = $('#nombreCategoria').val();
    if (categoria == "") {
        Swal.fire("Debes Agregar un Categoria");
        return false;
    } else {
        $.ajax({
            type: "POST",
            data: "categoria=" + categoria,
            url: "../Procesos/Categorias/agregarCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();
                if (respuesta == 1) {
                    $('#tablaCategorias').load("../Vistas/Gestor/tablaCategorias.php");
                    $('#nombreCategoria').val("");
                    Swal.fire("Exito", "Agregado con Exito", "success");
                } else {
                    Swal.fire("Error", "Ha ocurrido un error al ingresar Categoria", "error");

                }

            }
        });
    }
}



function eliminarCategoria(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if (idCategoria < 1) {
        Swal.fire("No tienes id de Categoria");
    } else {
        //***************************************************************** */
        Swal.fire({
            title: '¿Esta seguro de eliminar categoria?',
            text: "Una vez eliminada no podra recuperarla",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    data: "idCategoria=" + idCategoria,
                    url: "../Procesos/Categorias/EliminarCategoria.php",
                    success: function (respuesta) {
                        respuesta = respuesta.trim();

                        if (respuesta == 1) {
                            $('#tablaCategorias').load("../Vistas/Gestor/tablaCategorias.php");
                            Swal.fire(
                                'Eliminado',
                                'Archivo eliminado con exitos',
                                'success'
                            );
                        } else {
                            Swal.fire("Error", "Ah ocurrido un error", "error");
                        }
                    }
                });
            }
        })
        //***************************************************************** */
    }

}


function obtenerDatosCategoria(idCategoria) {
    idCategoria = parseInt(idCategoria);
    if (idCategoria < 1) {
        Swal.fire("No tienes id de Categoria");
    } else {
        //***************************************************************** */
        $.ajax({
            type: "POST",
            data: "idCategoria=" + idCategoria,
            url: "../Procesos/Categorias/obtenerCategoria.php",
            success: function (respuesta) {
                respuesta = jQuery.parseJSON(respuesta);
                
                $('#idCategoria').val(respuesta['idCategoria']);
                $('#categoriaU').val(respuesta['nombreCategoria']);
            }
        });

    }
    //***************************************************************** */
}


function editarCategoria() {
    if ( $('#categoriaU').val()=="") {
        Swal.fire("No tienes id de Categoria");
        return false;
    } else {
        //***************************************************************** */
        $.ajax({
            type: "POST",
            data:$('#frmActualizarCategoria').serialize(),
            url: "../Procesos/Categorias/actualizarCategoria.php",
            success: function (respuesta) {
                respuesta = respuesta.trim();

                if(respuesta == 1){

                    $('#tablaCategorias').load("../Vistas/Gestor/tablaCategorias.php");
                    
                    Swal.fire(
                        'Actualizado',
                        'Archivo actualizado con exito',
                        'success'
                    );

                    $('#modalActualizarCategoria').modal('toggle');

                }else{
                    Swal.fire("Error", "Ah ocurrido un error", "error");
                    console.log(respuesta);
                }
                
            }
        });

    }
    //***************************************************************** */
}


