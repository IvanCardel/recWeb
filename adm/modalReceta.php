<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    //C
    $idIngrediente=$_POST["idIngrediente"];
    //C
    $resultado=mysqli_query($cn,"select * from ingrediente where idIngrediente=".$idIngrediente);
    while($fila=mysqli_fetch_array($resultado)){
        //C
        $nomIngrediente= $fila["nombreIngrediente"];
        //C
        $uniMedida= $fila["unidadMedida"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <!--C-->
        <h5 class="modal-title">Editar Ingrediente</h5>
      </div>
      <div class="modal-body">
        <form class="form" id="formularioEditar">
        <label for="nombreIngrediente">Nombre del ingrediente: </label>
            <input type="hidden" name="accion" value="<?php echo$accion ?>">
            <!--C-->
            <input type="hidden" name="idIngrediente" value="<?php echo$idIngrediente ?>">
            <!--C-->
            <input type="text" name="nombreIngrediente" value="<?php echo$nomIngrediente ?>" class="form-control">

            <label for="nombreIngrediente">Unidad de  Medida: </label>
            <input type="text" name="unidadMedida" value="<?php echo$uniMedida ?>" class="form-control">
            <br>
            <!--C-->
            <input type="button" class="btn btn-primary" value="Editar Ingrediente" id="botonEditar">
        </form>
      </div>
    </div>
</div>
<script>
        //editar un ingrediente
        $("#botonEditar").on("click",function(){
            var parametros=$("#formularioEditar").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                //C
                url: "accionesIngrediente.php",
                data: parametros,
                success: function(){
                    //Ingrediente
                    window.location.replace("ingredientes.php");
                }
            });
        });
</script>
