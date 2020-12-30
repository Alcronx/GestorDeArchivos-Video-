function agregarArchivosGestor() {
    var formData = new FormData(document.getElementById('frmArchivos'))

    $.ajax({
        url: "../Procesos/archivos/guardarArchivos.php",
        type: "POST",
        datatype: "html",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            console.log(respuesta);
            respuesta = respuesta.trim();

            if (respuesta==1) {
                $('#frmArchivos')[0].reset();
                $('#tablaGestorArchivos').load("../Vistas/Gestor/tablaGestor.php");
                Swal.fire(
                    'Actualizado',
                    'Archivo Subido con exito',
                    'success'
                );
            } else {
                Swal.fire("Error", "Ah ocurrido un error", "error");
            }
        }
    });

}

function eliminarArchivo(idArchivo){
            //***************************************************************** */
            Swal.fire({
                title: '¿Esta seguro de eliminar Archivo?',
                text: "Una vez eliminada no podra recuperarlo",
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
                        data: "idArchivo=" + idArchivo,
                        url: "../Procesos/archivos/EliminarArchivos.php",
                        success: function (respuesta) {
                            respuesta = respuesta.trim();
                            console.log(respuesta);
    
                            if (respuesta == 1) {
                                $('#tablaGestorArchivos').load("../Vistas/Gestor/tablaGestor.php");
                                Swal.fire(
                                    'Eliminado',
                                    'Archivo eliminado con exito',
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


function obtenerArchivo(idArchivo){
    $.ajax({
        type: "POST",
        data: "idArchivo=" + idArchivo,
        url: "../Procesos/archivos/obtenerArchivo.php",
        success: function (respuesta) {
           $('#archivoObtenido').html(respuesta);
        }
    });
}