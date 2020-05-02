<?php require_once("Proteccion.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Pais</title>
</head>

<body>
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="bg2">
    <div class="container pt-5">
    <h1>Países</h1>
        <div class="jumbotron container" id="formulario" style="display:none">
        <h6 class="display-4 text-center">Alta País</h6>
            <form class="form" id="formularioPais">
                <label for="nombrePais">Nombre : </label>
                <input type="text" name="nombrePais" class="form-control">
                <hr>
                <input type="hidden" name="accion" value="insertar">
                <input type="button" class="btn btn-primary" id="insertar" value="Agregar Pais">
            </form>
        </div>
        <div class="row">
            <div class="offset-8 col-2">
                <div class="btn btn-primary btn-block" id="agregaPais">
                    <i class="fas fa-plus"></i> Agregar</div>
            </div>
        </div>
        <table class="table mt-1" id="tablaPais">
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
        $resultado=mysqli_query($cn,"select * from pais");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                echo"<td>".$fila['idPais']."</td>";
                echo"<td>".$fila['nombrePais']."</td>";
                echo"<td><div class='btn btn-success editar' data-id='".$fila['idPais']."'><i class='fas fa-pen'></i> Editar</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idPais']."'><i class='fas fa-trash'></i> Eliminar</div></td>";
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
        $("#tablaPais").dataTable({
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

        //Elimnar un pais
        $(".borrar").on("click",function(){
            var pais={
                idPais:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                url: "accionesPais.php",
                data: pais,
                success: function(){
                    window.location.replace("pais.php");
                }
            });
        });
        //editar un pais
        $(".editar").on("click",function(){
            var idpais=$(this).data("id");
            console.log(idpais);
            $(".modal").load("modalPais.php",{"accion":"editar","idPais":idpais});
            $(".modal").modal();

        });

        //agregar un nuevo pais
        $("#insertar").on("click",function(){
            var parametros=$("#formularioPais").serialize();
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

        //boton agregar pais
        $("#agregaPais").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
</body>

</html>