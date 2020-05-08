<?php require_once("Proteccion.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Recetas</title>
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
    <h1>Recetas</h1>
        <div class="jumbotron container bg-primary" id="formulario" style="display:none">
        <!-- Alta Receta -->
        <h6 class="display-4 text-center">Agregar Receta</h6>
                 <!-- idReceta-->
            <form class="form" id="formularioReceta">
                <!-- Abre la grid de 12 -->
                <div class="row">
                    <!-- Abre columna izquierda -->
                    <div class="col-6">
                        <!-- agregar nombre de receta-->
                        <label for="nombreReceta">Nombre : </label>
                         <!-- Entrada -->
                        <input type="text" name="nombreReceta" class="form-control">

                         <!-- Agregar instrucciones-->
                         <label for="instrucciones">Instrucciones : </label>
                         <!-- entrada instrucciones-->
                        <textarea type="text" name="instrucciones" class="form-control"></textarea>

                        <!-- Agregar fecha-->
                        <label for="fecha">Fecha : </label>
                         <!-- entrada fecha-->
                        <input type="date" name="fecha" class="form-control">

                    <!-- Cierra la columna izquierda -->
                    </div>

                    <!-- Abre columna derecha -->
                    <div class="col-6">

                        <!-- Carga datos del usuario -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos del usuario
                        $resultado=mysqli_query($cn,"select * from usuario");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idiUsr\">Usuario</label>
                            <select class=\"form-control\" id=\"exampleFormControlSelect1\">";
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idUsr']."'>".$fila['usr']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>

                        <!-- Carga datos de la categoría -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos de la categoría
                        $resultado=mysqli_query($cn,"select * from categoria");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idCategoria\">Categoría</label>
                            <select class=\"form-control\" id=\"exampleFormControlSelect1\">";
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idCategoria']."'>".$fila['nombreCategoria']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>

                        <!-- Agregar foto-->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <!-- Carga datos de la país -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos del país
                        $resultado=mysqli_query($cn,"select * from pais");
                        // Armamos el select
                        echo"<div class=\"form-group\">
                            <label for=\"idPais\">País</label>
                            <select class=\"form-control\" id=\"exampleFormControlSelect1\">";
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


                <hr>
                <input type="hidden" name="accion" value="insertar">
                 <!-- C-->
                <input type="button" class="btn btn-primary" id="insertar" value="Agregar Receta">
            </form>
        </div>
        <div class="row">
            <div class="offset-8 col-2">
                 <!-- C-->
                <div class="btn btn-primary btn-block" id="agregaReceta">
                    <i class="fas fa-plus"></i> Agregar</div>
            </div>
        </div>
         <!-- C-->
        <table class="table mt-1" id="tablaReceta">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre Receta</th>
                    <th>Instrucciones</th>
                    <th>Fecha</th>
                    <th>Usr.</th>
                    <th>Cat.</th>
                    <th>Foto</th>
                    <th>Pais</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        require_once("../conec.php");
        // C
        $resultado=mysqli_query($cn,"select * from receta");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                // id Receta
                echo"<td>".$fila['idReceta']."</td>";
                // nombre Receta
                echo"<td>".$fila['nombreReceta']."</td>";
                // instrucciones
                echo"<td>".$fila['instrucciones']."</td>";
                // fecha
                echo"<td>".$fila['fecha']."</td>";
                // id usuario
                echo"<td>".$fila['idUsr']."</td>";
                // id categoría
                echo"<td>".$fila['idCategoria']."</td>";
                // foto
                echo"<td>".$fila['foto']."</td>";
                // id pais
                echo"<td>".$fila['idPais']."</td>";
                // Acciones
                echo"<td><div class=\"container\"><div class='btn btn-success editar' data-id='".$fila['idReceta']."'><i class='fas fa-pen'></i> Editar</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idReceta']."'><i class='fas fa-trash'></i> Eliminar</div></div></td>";
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

        //Elimnar una receta
        $(".borrar").on("click",function(){
            //C
            var receta={
                //C
                idreceta:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                //C
                url: "accionesReceta.php",
                //C
                data: receta,
                success: function(){
                    //C
                    window.location.replace("recetas.php");
                }
            });
        });
        //editar una receta
        $(".editar").on("click",function(){
            //C
            var idreceta=$(this).data("id");
            //C
            console.log(idreceta);
            //C
            $(".modal").load("modalReceta.php",{"accion":"editar","idReceta":idreceta});
            $(".modal").modal();

        });

        //agregar una receta
        $("#insertar").on("click",function(){
            //C
            var parametros=$("#formularioReceta").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                //C
                url: "accionesReceta.php",
                data: parametros,
                success: function(){
                    //C
                    window.location.replace("recetas.php");
                }
            });
        });

        //boton agregar ingrediente
        //C
        $("#agregaReceta").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
    
</body>

</html>