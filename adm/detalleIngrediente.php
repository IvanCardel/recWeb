<?php require_once("Proteccion.php") ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Agregar Ingredientes</title>
</head>

<body>
    <div class="bg1">
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="container te pt-5">
    <h1 class="offset-1">Ingredientes disponibles &nbsp &nbsp Ingredientes agregados </h1>
     <div class="row">
                    <!-- Abre columna izquierda -->
                    <div class="col-6">
        <table class="table mt-1" id="tablaReceta">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Ingrediente</th>
                    <th>Unidad de Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    <?php 
        require_once("../conec.php");
        // $idReceta=$_POST["idReceta"];
        $idReceta = $_GET["idReceta"];
        $resultado=mysqli_query($cn,"SELECT * FROM ingrediente WHERE ingrediente.idIngrediente NOT IN (SELECT idIngrediente FROM detalleingrediente WHERE idReceta=$idReceta)");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                echo"<td>$idReceta</td>";
                echo"<td>".$fila['nombreIngrediente']."</td>";
                echo"<td>".$fila['unidadMedida']."</td>";
                // Acciones
                echo"<td>
                <div class=\"container\"><div class='btn btn-primary agregaring' data-id='".$fila['idIngrediente']."'><i class='fas fa-plus'></i> Insertar</div></td>";
            echo"</tr>";
        }
    ?>
            </tbody>
        </table>
               <!-- Cierra columna izquierda -->
                    </div>
                    <!------------------------ INGREDIENTES QUE YA HAN SIDO AGREGADOS ------------------------------------->
                    <!-- Abre columna derecha -->
                    <div class="col-6">
                    <table class="table mt-1" id="tablaReceta2">   
            <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>Ingrediente</th>
                    <th>Unidad de Medida</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    <?php 
        require_once("../conec.php");
        $resultado=mysqli_query($cn,"SELECT * FROM detalleingrediente d inner join ingrediente i on (d.idIngrediente=i.idIngrediente) WHERE idReceta =$idReceta");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                // echo"<td>".$fila['idReceta']."</td>";
                echo"<td>".$fila['nombreIngrediente']."</td>";
                echo"<td>".$fila['unidadMedida']."</td>";
                echo"<td>".$fila['cantidad']."</td>";
                // Acciones
                echo"<td>
                <div class=\"container\"><div class='btn btn-danger borrar' data-id='".$fila['idIngrediente']."'><i class='fas fa-trash'></i> Eliminar</div></td>";
            echo"</tr>";
        }
    ?>
            </tbody>
        </table>
                             <!-- Cierra columna derecha -->
                    </div>
                <!-- Cierra la grid -->
                </div>

    </div>
    <!-- Ventana Modal -->
    <div class="modal" role="dialog">

    </div>
    </div>
    <!-- Footer -->
    <?php include_once("../layout/footer.php"); ?>

    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script>

        //DataTables
        // C
        $(".borrar").on("click",function(){
            var receta={
                idReceta:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                url: "accionesReceta.php",
                data: receta,
                success: function(){
                    window.location.replace("detalleIngrediente.php");
                }
            });
        });
 
        $(".agregaring").on("click",function(){
            var idIngrediente=$(this).data("id");
            console.log(idIngrediente);
            $(".modal").load("modalIng.php",{"accion":"insertar","idIngrediente":idIngrediente});
            $(".modal").modal();
        });

    </script>
    
</body>

</html>