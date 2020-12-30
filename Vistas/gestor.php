<?php 

session_start();

if(isset($_SESSION['usuario'])){

  include "header.php"; ?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Gestor De Archivos</h1>
        <span class="btn btn-primary"  data-toggle="modal" data-target="#modalAgregarArchivos">
            <span class=" fas fa-plus-circle"></span> Agregar Archivos
        </span>
        <hr>
        <div id="tablaGestorArchivos"> </div>
    </div>
</div>
</div>

<!--Modal para agregar archivos-->

<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="frmArchivos" enctype="multipart/form-data" method="post">
            <label>categoria</label>
            <div id="CategoriasLoad"></div>
            <label >Seleccionar Archivos</label>
            <input type="file" name="Archivos[]" id="Archivos[]" class="form-control" multiple="">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar Archivos</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Previsualizar-->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Archivo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body d-flex justify-content-center">
        <div id="archivoObtenido"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<?php include "footer.php"; ?>
<script src="../Js/gestor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablaGestorArchivos').load("Gestor/tablaGestor.php");
        $('#CategoriasLoad').load("Gestor/selectCategorias.php");

        $('#btnGuardarArchivos').click(function(){
          agregarArchivosGestor();
        });
    });
</script>

<?php 
}else{
  header("location:../index.php");
}
?>