<?php require_once("Proteccion.php")?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Categorías</title>
</head>

<body>

    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="bg5">
        <div class="container te pt-5">
            <h1>Categorías</h1>
            <div class="jumbotron container bg-primary" id="formulario" style="display:none">
            <h6 class="display-4 text-center">Agregar Categoría</h6>
                     <!-- Aquí cambio el id del formulario país por el de categoría -->
                <form class="form" id="formularioCategoria">
                    <!-- C-->
                    <label for="nombreCategoria">Nombre : </label>
                     <!-- C-->
                    <input type="text" name="nombreCategoria" class="form-control">
                    <hr>
                    <input type="hidden" name="accion" value="insertar">
                     <!-- C-->
                    <input type="button" class="btn btn-primary bordeBot" id="insertar" value="Agregar Categoria">
                </form>
            </div>
            <div class="row">
                <div class="offset-8 col-2">
                     <!-- C-->
                    <div class="btn btn-primary btn-block" id="agregaCategoria">
                        <i class="fas fa-plus"></i> Agregar</div>
                </div>
            </div>
             <!-- C-->
            <table class="table mt-1" id="tablaCategoria">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
            require_once("../conec.php");
            // C
            $resultado=mysqli_query($cn,"select * from categoria");
            while($fila=mysqli_fetch_array($resultado)){
                echo"<tr>";
                    //C
                    echo"<td>".$fila['idCategoria']."</td>";
                    //C
                    echo"<td>".$fila['nombreCategoria']."</td>";
                    //C
                    echo"<td><div class=\"container\"><div class='btn btn-success editar' data-id='".$fila['idCategoria']."'><i class='fas fa-pen'></i> Editar</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idCategoria']."'><i class='fas fa-trash'></i> Eliminar</div></div></td>";
                echo"</tr>";
            }
        ?>
                </tbody>
            </table>

        </div>
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
        $("#tablaCategoria").dataTable({
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

        //Elimnar un categorias
        $(".borrar").on("click",function(){
            //C
            var categoria={
                //C
                idCategoria:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                //C
                url: "accionesCategoria.php",
                //C
                data: categoria,
                success: function(){
                    //C
                    window.location.replace("categorias.php");
                }
            });
        });
        //editar un categoria
        $(".editar").on("click",function(){
            //C
            var idcategoria=$(this).data("id");
            //C
            console.log(idcategoria);
            //C
            $(".modal").load("modalCategoria.php",{"accion":"editar","idCategoria":idcategoria});
            $(".modal").modal();

        });

        //agregar una nueva categoria
        $("#insertar").on("click",function(){
            //C
            var parametros=$("#formularioCategoria").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                //C
                url: "accionesCategoria.php",
                data: parametros,
                success: function(){
                    //C
                    window.location.replace("categorias.php");
                }
            });
        });

        //boton agregar categoria
        //C
        $("#agregaCategoria").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
</body>

</html>