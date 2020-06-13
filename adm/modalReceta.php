<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    //C
    $idReceta=$_POST["idReceta"];
    //C
    $resultado=mysqli_query($cn,"select * from receta where idReceta=".$idReceta);
    while($fila=mysqli_fetch_array($resultado)){
        //Variables
        $nomReceta= $fila["nombreReceta"];
        $inst= $fila["instrucciones"];
        $idCate= $fila["idCategoria"];
        $idPa= $fila["idPais"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <!--C-->
          <h5 class="modal-title">Editar Receta</h5>
        </div>
        <div class="modal-body">
            <form class="form" id="formularioEditar">
                <input type="hidden" name="accion" value="<?php echo$accion ?>">
                <input type="hidden" name="idReceta" value="<?php echo$idReceta?>">
                <label for="nombreReceta">Nombre de la receta: </label>
                <input type="text" name="nombreReceta" class="form-control" value="<?php echo$nomReceta ?>">
                 <label for="instrucciones">Instrucciones : </label>
                 <textarea name="instrucciones" class="form-control" ><?php echo$inst ?></textarea>
                <div>
                <?php
                require_once("../conec.php");
                $resultado=mysqli_query($cn,"select * from categoria ");
                $res=mysqli_query($cn,"select * from categoria where idCategoria = $idCate");
                echo"<div class='form-group'>";
                if($fil=mysqli_fetch_array($res))  
                    echo"<label for='idCategoria'>Categoría:</label>
                    <select class='form-control' name='idCategoria'>
                    <option selected>".$fil['nombreCategoria']."";
                while($fila=mysqli_fetch_array($resultado)){  
                    echo "<option value='".$fila['idCategoria']."'>".$fila['nombreCategoria']."</option>";
                }
                    echo"</select>
                </div>";
                ?>
                </div>
                <div>
                <?php
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"SELECT * FROM pais");
                    $res=mysqli_query($cn,"select * from pais where idPais = $idPa");
                    $fil=mysqli_fetch_array($res);
                        echo"<div class='form-group'>";
                            echo"<label for='idPais'>País: </label>
                            <select class='form-control' name='idPais'>
                            <option selected>".$fil['nombrePais']."";
                            while($fila=mysqli_fetch_array($resultado))
                            {
                                echo "<option value='".$fila['idPais']."'>".$fila['nombrePais']."</option>";
                            }
                            echo"</select>
                        </div>";
                ?>
                </div>
                <br>
                <!--Editar -->
                <input type="button" class="btn btn-primary" value="Editar Receta" id="botonEditar">
                <!--Btn Cancelar -->
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
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
                url: "accionesReceta.php",
                data: parametros,
                success: function(){
                    //Ingrediente
                    window.location.replace("recetas.php");
                }
            });
        });
</script>
