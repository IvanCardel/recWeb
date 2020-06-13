<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    $idReceta=$_POST["idReceta"];
    $resultado=mysqli_query($cn,"select * from receta where idReceta=".$idReceta);
    while($fila=mysqli_fetch_array($resultado)){
        $foto= $fila["foto"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <!--C-->
          <h5 class="modal-title">Cargar una foto nueva</h5>
        </div>
        <div class="modal-body">
            <form class="form" id="formularioEditar" enctype='multipart/form-data' action='accionesReceta.php' method='POST'>
                <input type="hidden" name="accion" value="<?php echo$accion ?>">
                <input type="hidden" name="idReceta" value="<?php echo$idReceta?>">
                
                <div class="form-group">
                    <label for="foto"></label>
                    <input type="file" class="form-control-file" name="foto" id="foto">
                </div>
                <br>
                <input type="submit" class="btn btn-primary" value="Editar Foto" id="botonEditar">
                &nbsp
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </form>
        </div>
    </div>
</div>

