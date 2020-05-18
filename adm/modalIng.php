<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    $idIngrediente=$_POST["idIngrediente"];
    $idReceta=$_POST["idReceta"];
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <!--C-->
        <h5 class="modal-title">Agregar Cantidad</h5>
      </div>
      <div class="modal-body">
            <form class="form" id="formularioEditar">
                                    
                <input type="hidden" name="accion" value="<?php echo$accion ?>">
                <label for="idReceta"> id Receta</label>
                <input type="hidden" name="idReceta" value="<?php echo$idReceta ?>">
                
              

                <label for="idIngrediente">Ingrediente</label>
                <input type="hidden" name="idIngrediente" value="<?php echo$idIngrediente?>">
        
                <label for="cantidad"> Cantidad</label>
                <input type="text" name="cantidad" class="form-control">
                <br>
                <input type="button" class="btn btn-primary" value="Agregar Ingrediente" id="botonInsertar">
        </form>
      </div>
    </div>
</div>
<br>
<script>
        //editar un ingrediente
        $("#botonInsertar").on("click",function(){
            var parametros=$("#formularioEditar").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                //C
                url: "accionesDetalle.php",
                data: parametros,
                success: function(){
                    //Ingrediente
                    window.location.reload("detalleIngrediente.php");
                }
            });
        });
</script>
