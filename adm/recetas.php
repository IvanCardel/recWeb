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
        <div class="jumbotron container bg-primary" id="formulario" style="display:none" enctype="multipart/form-data">
        <!-- Alta Receta -->
        <h6 class="display-4 text-center">Paso 1 de 2</h6>
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

                        <div class="auto" id="auto" style="display: none">
                        <!-- Agregar fecha-->
                        <label for="fecha">Fecha : </label>
                        <!-- <input type="date" name="fecha" class="form-control" > -->
                        <input class="form-control" type="date" name="fecha" step="1"  value="<?php echo date("Y-m-d");?>">
                    <!-- Cierra la columna izquierda -->
                        </div>
                        <div class="form-group">
                            <label for="idUsr">Usuario</label>
                            <select class="form-control" name="idUsr" id="idUsr">";
                        <!-- Carga datos del usuario -->
                        <?php
                        // Requerimos conección a la DB
                        require_once("../conec.php");
                        // Query para traer los datos del usuario
                        $resultado=mysqli_query($cn,"select * from usuario");
                        // Armamos el select
                        while($fila=mysqli_fetch_array($resultado)){  
                            echo "<option value='".$fila['idUsr']."'> ".$fila['usr']."</option>";
                        }
                            echo"</select>
                        </div>";
                        ?>
                    </div>

                    <!-- Abre columna derecha -->
                    <div class="col-6">
                    <!-- Categoría -->
                        <div class="form-group">
                            <label for="idCategoria">Categoría</label>
                            <select class="form-control" name="idCategoria" id="idCategoria">";
                            <!-- Carga datos de la categoría -->
                            <?php
                            // Requerimos conección a la DB
                            require_once("../conec.php");
                            // Query para traer los datos de la categoría
                            $resultado=mysqli_query($cn,"select * from categoria");
                            // Armamos el select
                            while($fila=mysqli_fetch_array($resultado)){  
                                echo "<option value='".$fila['idCategoria']."'>".$fila['nombreCategoria']."</option>";
                            }
                            ?>
                            </select>
                        </div>                        
                        <!-- Agregar foto-->
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="text" class="form-control-file" name="foto" id="foto">
                        </div>
                        <!-- País -->
                        <div class="form-group">
                            <label for="idPais">País</label>
                            <select class="form-control" name="idPais" id="idPais">
                            <!-- Carga datos de la país -->
                            <?php
                            // Requerimos conección a la DB
                            require_once("../conec.php");
                            // Query para traer los datos del país
                            $resultado=mysqli_query($cn,"select * from pais");
                            // Armamos el select
                            while($fila=mysqli_fetch_array($resultado)){  
                                echo "<option value='".$fila['idPais']."'>".$fila['nombrePais']."</option>";
                            }
                            ?>
                            </select>
                        </div>
                        <!-- Cierra columna derecha -->
                    </div>
                <!-- Cierra la grid -->
                </div>
                <hr>
                <input type="hidden" name="accion" value="insertar">
                 <!-- C-->
                <input type="button" class="btn btn-primary" id="insertar" value="Agregar Ingredientes">
            </form>
        </div>
        <div class="row">
            <div class="offset-8 col-2">
                 <!-- C-->
                <div class="btn btn-primary btn-block" id="agregaReceta">
                    <i class="fas fa-plus"></i> Agregar Recetas</div>
            </div>
        </div>
         <!-- C-->
        <table class="table mt-1" id="tablaReceta">
            <thead>
                <tr>
                  
                    <th>Foto</th>
                    <th>Receta</th>
                    <th>Categoría</th>
                    <th>Pais</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
        require_once("../conec.php");
        // C
        $resultado=mysqli_query($cn,"SELECT idReceta, foto, nombreCategoria, nombrePais, nombreReceta, fecha FROM receta R LEFT JOIN pais P ON (R.idPais = P.idPais) LEFT JOIN categoria C ON (R.idCategoria=C.idCategoria)");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
            
            echo"<td><img src='../image/receta".$fila['foto']."' width='60px'></td>";
            echo"<td>".$fila['nombreReceta']."</td>";
            echo"<td>".$fila['nombreCategoria']."</td>";
            echo"<td>".$fila['nombrePais']."</td>";
            echo"<td>".$fila['fecha']."</td>";
            echo"<td><div class=\"container\"><div class='btn btn-primary editar' data-id='".$fila['idReceta']."'><i class='fas fa-pen'></i> Editar Ingredientes</div> <div class='btn btn-success editar' data-id='".$fila['idReceta']."'><i class='fas fa-pen'></i> Editar</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idReceta']."'><i class='fas fa-trash'></i> Eliminar</div><div></td>";
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
                idReceta:$(this).data("id"),
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
            var idReceta=$(this).data("id");
            //C
            console.log(idReceta);
            //C
            $(".modal").load("modalReceta.php",{"accion":"editar","idReceta":idReceta});
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
                    window.location.assign("detalleIngrediente.php");
                }
            });
        });

        
        //C
        $("#agregaReceta").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
    
</body>

</html>