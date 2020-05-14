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
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <body>
    <div class="bg1">
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="container te pt-5">
    <h1>Ingredientes disponibles</h1>
        <table class="table mt-1" id="tablaReceta">
            <thead>
                <tr>
                
                    <th>#</th>
                    <th>Nombre Ingrediente</th>
                    <th>Unidad de Medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
    <?php 
        require_once("../conec.php");
        $resultado=mysqli_query($cn,"SELECT * FROM ingrediente ");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                echo"<td>".$fila['idIngrediente']."</td>";
                echo"<td>".$fila['nombreIngrediente']."</td>";
                echo"<td>".$fila['unidadMedida']."</td>";
                // Acciones
                echo"<td>
                <div class=\"container\"><div class='btn btn-primary editarIng' data-id='".$fila['idIngrediente']."'><i class='fas fa-plus'></i> Insertar</div></td>";
            echo"</tr>";
        }
    ?>
            </tbody>
        </table>

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
        $("#tablaReceta").dataTable({
            language: {
                processing:     "Procesando",
                search:         "Buscar",
                lengthMenu:    "Mostrar _MENU_ Elementos",
                info:           "página _START_ de _END_ en _TOTAL_ elementos",
                infoEmpty:      "Sin información",
                infoFiltered:   "filtrado de _MAX_ elementos en total)",
                paginate: {
                    first:      "primera",
                    previous:   "anterior",
                    next:       "siguiente",
                    last:       "última"
                },
                aria: {
                    sortAscending:  ": Acendente",
                    sortDescending: ": Descendente"
                }
            }
        });

    
 
        $(".editarIng").on("click",function(){
            var idIngrediente=$(this).data("id");
             
            console.log(idIngrediente);
            //C
            $(".modal").load("modalIng.php",{"accion":"insertar","idIngrediente":idIngrediente});
            $(".modal").modal();
        });

    </script>
    
</body>

</html>