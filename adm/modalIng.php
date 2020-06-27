<?php 
    require_once("../conec.php");
    $idIngrediente=$_POST["idIngrediente"];
    $idReceta=$_POST["idReceta"];
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Cantidad</h5>
      </div>
      <div class="modal-body">
            <form class="form" id="formularioEditar" method="POST" action="accionesDetalle.php">
                <label for="accion"></label>    
                <input type="hidden" name="accion" value="insertar">

                <label for="idReceta"></label> 
                <input type="hidden" name="idReceta" value="<?php echo$idReceta ?>">

                <label for="idIngrediente"></label>
                <input type="hidden" name="idIngrediente" value="<?php echo$idIngrediente?>">
        
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" class="form-control">
                <br>
                <input type="submit" class="btn btn-primary" value="Agregar Ingrediente" id="botonInsertar">
        </form>
      </div>
    </div>
</div>
<br>

