<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];

    $idIngrediente=$_POST["idIngrediente"];
   
    // $resultado=mysqli_query($cn,"select * from receta where idReceta=".$idReceta);
    // while($fila=mysqli_fetch_array($resultado)){
    //     //Variables
    //     $nomReceta= $fila["nombreReceta"];
    //     $inst= $fila["instrucciones"];
    //     $fech= $fila["fecha"];
    //     $idU= $fila["idUsr"];
    //     $idCate= $fila["idCategoria"];
    //     $fot= $fila["foto"];
    //     $idPa= $fila["idPais"];
    // }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <!--C-->
        <h5 class="modal-title">Editar Ingrediente</h5>
      </div>
      <div class="modal-body">
            <form class="form" id="formularioEditar">
                                    
                <input type="hidden" name="accion" value="<?php echo$accion ?>">
                <?php 
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"select * from receta order by (idReceta)desc");
                    if($fila=mysqli_fetch_array($resultado))
                    {
                        //echo"<td> ".$fila['idReceta']."</td>";
                        
                        echo"<label for=\"idReceta\"></label>";
                        echo"<input type=\"hidden\" name=\"idReceta\" value=\"$fila[idReceta]\">";
                    }
                    ?>

                <label for="idIngrediente"></label>
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
                    window.location.replace("detalleIngrediente.php");
                }
            });
        });
</script>
