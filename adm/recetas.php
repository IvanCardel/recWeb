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
    <div class="bg8">
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="container te pt-5">
    <h1>Recetas</h1>
        <div class="jumbotron col-10 container bg-primary" id="formulario" style="display:none">
        <!-- <h6 class="display-4 text-center">Agregar Receta</h6> -->
            <form class="form" id="formularioReceta" enctype="multipart/form-data" action="accionesReceta.php" method="POST">
            <input type="hidden" name="accion" value="insertar">
                <!-- <div class="row"> -->
                    <!-- Abre columna izquierda -->
                    <!-- <div class="col-6"> -->
                        <label for="nombreReceta">Nombre : </label>
                        <input type="text" name="nombreReceta" class="form-control">
                         <label for="instrucciones">Instrucciones : </label>
                        <textarea type="text" name="instrucciones" class="form-control"></textarea>
                        <!-- Cierra columna izquierda -->
                    <!-- </div> -->
                    <!-- Abre columna derecha -->
                    <!-- <div class="col-6"> -->
                        <div class="form-group">
                            <label for="idCategoria">Categoría</label>
                            <select class="form-control" name="idCategoria" id="idCategoria">";
                                <?php
                                require_once("../conec.php");
                                $resultado=mysqli_query($cn,"select * from categoria");
                                while($fila=mysqli_fetch_array($resultado)){  
                                    echo "<option value='".$fila['idCategoria']."'>".$fila['nombreCategoria']."</option>";
                                }
                                ?>
                            </select>
                        </div>                        
                        <!-- Agregar foto-->
                       
                            <input type="file" name="foto" id="" class="form-control-file">
                       

                        <!-- País -->
                        <div class="form-group">
                            <label for="idPais">País</label>
                            <select class="form-control" name="idPais" id="idPais">
                            <?php
                                require_once("../conec.php");
                                $resultado=mysqli_query($cn,"select * from pais");
                                while($fila=mysqli_fetch_array($resultado)){  
                                    echo "<option value='".$fila['idPais']."'>".$fila['nombrePais']."</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <!-- Cierra columna derecha -->
                    <!-- </div> -->
                <!-- Cierra la grid -->
                <!-- </div> -->
               
                <hr>
                <input type="submit" value="Agregar Receta" class="btn btn-primary">
                <!-- <input type="button" class="btn btn-primary" id="insertar" value="Agregar"> -->
            </form>
        </div>
        <div class="row">
        <div class="offset-8 col-2-s-1">
                 <!-- C-->
                <div class="btn btn-primary btn-block" id="agregaReceta">
                    <i class="fas fa-plus"></i> Agregar Recetas</div>
            </div>
        </div>
         <!-- Para mostrar las tablas de esta forma, necesitamos importar la librería datatables.min con la
         extensión js-->
        <table class="table mt-1" id="tablaReceta">
            <thead>
            <!-- Encabezados de la tabla -->
                <tr>
                    <th>Foto</th>
                    <th>#</th>
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
        $resultado=mysqli_query($cn,"SELECT idReceta, foto, nombreCategoria, nombrePais, nombreReceta, fecha 
        FROM receta R LEFT JOIN pais P ON (R.idPais = P.idPais) LEFT JOIN categoria C ON (R.idCategoria=C.idCategoria)");
        // Aquí se llena la tablas, contiene la información de las recetas y los botones para modificar su contenido
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
            echo"<td><img src='../image/receta/".$fila['foto']."' width='60px'></td>";
            echo"<td>".$fila['idReceta']."</td>";
            echo"<td>".$fila['nombreReceta']."</td>";
            echo"<td>".$fila['nombreCategoria']."</td>";
            echo"<td>".$fila['nombrePais']."</td>";
            echo"<td>".$fila['fecha']."</td>";
            echo"<td>
            <div class='container'>
                <div class='btn btn-primary editar' data-id='".$fila['idReceta']."'>
                    <i class='fas fa-pen'></i>&nbsp Ingredientes
                </div>
                <div class='btn btn-warning editarF' data-id='".$fila['idReceta']."'>
                    <i class='fas fa-pen'></i> Editar Foto 
                </div> 
            </div> 
            <br>
            <div class='container'>  
                <div class='btn btn-success editar' data-id='".$fila['idReceta']."'>
                    <i class='fas fa-pen'></i> Editar Receta
                </div>
                <div class='btn btn-danger borrar' data-id='".$fila['idReceta']."'>
                    <i class='fas fa-trash'></i>&nbsp Eliminar &nbsp &nbsp
                </div>
            </div>
                </td>";
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
    <?php include_once("../layout/footer2.php"); ?>

    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script>

        //Con este código ese pueden observar los DataTables

        $("#tablaReceta").dataTable({
            language: {
                processing:     "Procesando",
                search:         "Buscar",
                lengthMenu:    "Mostrar _MENU_ Elementos",
                info:           "página _START_ de _END_ en _TOTAL_ elementos",
                infoEmpty:      "Sin información",
                infoFiltered:   "filtrado de _MAX_ elementos en total",
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
            var receta={
                idReceta:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                url: "accionesReceta.php",
                data: receta,
                success: function(){
                    window.location.replace("recetas.php");
                }
            });
        });
        //editar una receta
        $(".editar").on("click",function(){
            var idReceta=$(this).data("id");
            console.log(idReceta);
            $(".modal").load("modalReceta.php",{"accion":"editar","idReceta":idReceta});
            $(".modal").modal();
        });

        $(".editarF").on("click",function(){
            var idReceta=$(this).data("id");
            console.log(idReceta);
            $(".modal").load("modalRecetaFoto.php",{"accion":"editarF","idReceta":idReceta});
            $(".modal").modal();
        });

        $("#insertar").on("click",function(){
            var parametros=$("#formularioReceta").serialize();
            console.log(parametros);
            $.ajax({
                method: "POST",
                url: "accionesReceta.php",
                data: parametros,
                success: function(){
                    window.location.replace("recetas.php");
                }
            });
        });

        // $(".edita").on("click",function(){
        //     var receta={
        //         idReceta:$(this).data("id"),
        //         accion:"edita",
        //     };
        //     $.ajax({
        //         method: "POST",
        //         url: "detalleIngrediente.php",
        //         data: receta,
        //         success: function(){
        //             window.location.replace("detalleIngrediente.php");
        //         }
        //     });
        // });



        
        //C
        $("#agregaReceta").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
    
</body>

</html>