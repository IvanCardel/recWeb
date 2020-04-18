<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Ingredientes</title>
</head>

<body>
    <!-- Proteccion -->
    <?php require_once("Proteccion.php") ?>
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="container pt-5">
        <div class="jumbotron container" id="formulario" style="display:none">
        <!-- Alta ingredientes -->
        <h6 class="display-4 text-center">Alta Ingrediente</h6>
                 <!-- Aquí cambio el id del formulario país por el de ingrediente-->
            <form class="form" id="formularioIngrediente">
                <!-- C agregar nombre de ingrediente-->
                <label for="nombreIngrediente">Nombre : </label>
                 <!-- C-->
                <input type="text" name="nombreIngrediente" class="form-control">
                <!-- C agregar unidad de medida-->
                <label for="unidadMedida">Unidad de Medida : </label>
                 <!-- C-->
                <input type="text" name="unidadMedida" class="form-control">
                <hr>
                <input type="hidden" name="accion" value="insertar">
                 <!-- C-->
                <input type="button" class="btn btn-primary" id="insertar" value="Agregar Ingrediente">
            </form>
        </div>
        <div class="row">
            <div class="offset-8 col-2">
                 <!-- C-->
                <div class="btn btn-primary btn-block" id="agregaIngrediente">
                    <i class="fas fa-plus"></i> Agregar</div>
            </div>
        </div>
         <!-- C-->
        <table class="table mt-1" id="tablaIngrediente">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                     <!-- Agregamos una columna-->
                    <th>Unidad de medida</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        require_once("../conec.php");
        // C
        $resultado=mysqli_query($cn,"select * from ingrediente");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                //C
                echo"<td>".$fila['idIngrediente']."</td>";
                //C
                echo"<td>".$fila['nombreIngrediente']."</td>";
                //C Agregamos unidad de medida 
                echo"<td>".$fila['unidadMedida']."</td>";
                //C UdM 
                echo"<td><div class='btn btn-success editar' data-id='".$fila['idIngrediente']."'><i class='fas fa-pen'></i> Editar</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idIngrediente']."'><i class='fas fa-trash'></i> Eliminar</div></td>";
            echo"</tr>";
        }
    ?>
            </tbody>
        </table>

    </div>
    <!-- Ventana Modal -->
    <div class="modal" role="dialog">

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
        $("#tablaIngrediente").dataTable({
            language: {
                processing:     "Procesando",
                search:         "Buscar",
                lengthMenu:    "Mostrar _MENU_ Elementos",
                info:           "pagina _START_ de _END_ en _TOTAL_ elmentos",
                infoEmpty:      "Sin informacion",
                infoFiltered:   "filtrado de _MAX_ elementos en total)",
                paginate: {
                    first:      "primera",
                    previous:   "anterior",
                    next:       "siguiente",
                    last:       "ultima"
                },
                aria: {
                    sortAscending:  ": Acendente",
                    sortDescending: ": Descendente"
                }
            }
        });

        //Elimnar un ingredientes
        $(".borrar").on("click",function(){
            //C
            var ingrediente={
                //C
                idIngrediente:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                //C
                url: "accionesIngrediente.php",
                //C
                data: ingrediente,
                success: function(){
                    //C
                    window.location.replace("ingredientes.php");
                }
            });
        });
        //editar un ingrediente
        $(".editar").on("click",function(){
            //C
            var idingrediente=$(this).data("id");
            //C
            console.log(idingrediente);
            //C
            $(".modal").load("modalIngrediente.php",{"accion":"editar","idIngrediente":idingrediente});
            $(".modal").modal();

        });

        //agregar un ingrediente
        $("#insertar").on("click",function(){
            //C
            var parametros=$("#formularioIngrediente").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                //C
                url: "accionesIngrediente.php",
                data: parametros,
                success: function(){
                    //C
                    window.location.replace("ingredientes.php");
                }
            });
        });

        //boton agregar ingrediente
        //C
        $("#agregaIngrediente").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
</body>

</html>