<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    $idPais=$_POST["idPais"];
    $resultado=mysqli_query($cn,"select * from pais where idPais=".$idPais);
    while($fila=mysqli_fetch_array($resultado)){
        $nomPais= $fila["nombrePais"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Pais</h5>
      </div>
      <div class="modal-body">
        <form class="form" id="formularioEditar">
            <label for="nombrePais">nombre del pais: </label>
            <input type="hidden" name="accion" value="<?php echo$accion ?>">
            <input type="hidden" name="idPais" value="<?php echo$idPais ?>">
            <input type="text" name="nombrePais" value="<?php echo$nomPais ?>" class="form-control">
            <br>
            <input type="button" class="btn btn-primary" value="Editar Pais" id="botonEditar">
        </form>
      </div>
    </div>
</div>
<script>
        //editar un pais
        $("#botonEditar").on("click",function(){
            var parametros=$("#formularioEditar").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                url: "accionesPais.php",
                data: parametros,
                success: function(){
                    window.location.replace("pais.php");
                }
            });
        });
</script>
