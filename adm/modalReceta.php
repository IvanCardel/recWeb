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
        $fech= $fila["fecha"];
        $idU= $fila["idUsr"];
        $idCate= $fila["idCategoria"];
        $fot= $fila["foto"];
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
            <div class="row">
                    <!-- Abre columna izquierda -->
                    <div class="col-6">
                        <label for="nombreReceta">Nombre : </label>
                        <input type="hidden" name="accion" value="<?php echo$accion ?>">
                        <input type="hidden" name="idReceta" value="<?php echo$idReceta?>">
                        <!-- agregar nombre de receta-->
                         <!-- Entrada -->
                        <input type="text" name="nombreReceta" class="form-control" value="<?php echo$nomReceta ?>">
                         <!-- Agregar instrucciones-->
                         <label for="instrucciones">Instrucciones : </label>
                         <!-- entrada instrucciones-->
                        <input type="text" name="instrucciones" class="form-control" value="<?php echo$inst ?>">
                        <!-- Agregar fecha-->
                        <label for="fecha">Fecha : </label>
                         <!-- entrada fecha-->
                        <input type="date" name="fecha" class="form-control" value="<?php echo$fech ?>">
                    <!-- Cierra la columna izquierda -->
                    </div>

                    <!-- Abre columna derecha -->
                    <div class="col-6">

                        <!-- Carga datos del usuario -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos del usuario
                        $resultado=mysqli_query($cn,"select * from usuario where idUsr = $idU");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idUsr\">Usuario</label>
                            <select class=\"form-control\" name=\"idUsr\" id=\"idUsr\">";
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idUsr']."'>     ".$fila['usr']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>

                        <!-- Carga datos de la categoría -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos de la categoría
                        $resultado=mysqli_query($cn,"select * from categoria where idCategoria = $idCate");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idCategoria\">Categoría</label>
                            <select class=\"form-control\" name=\"idCategoria\" id=\"idCategoria\">";
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idCategoria']."'>".$fila['nombreCategoria']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>

                        <!-- Agregar foto-->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="text" class="form-control-file" name="foto" id="foto" value="<?php echo$fot ?>">
                        </div>

                        <!-- Carga datos de la país -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos del país
                        $resultado=mysqli_query($cn,"select * from pais where idPais=$idPa");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idPais\">País</label>
                            <select class=\"form-control\" name=\"idPais\" id=\"idPais\">";
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idPais']."'>".$fila['nombrePais']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>
                        <!-- Cierra columna derecha -->
                    </div>
                <!-- Cierra la grid -->
                </div>
           

            <br>
            <!--C-->
            <input type="button" class="btn btn-primary" value="Editar Receta" id="botonEditar">
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
