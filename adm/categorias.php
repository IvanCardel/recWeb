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
            <div class="jumbotron container col-10  bg-warning" id="formulario" style="display:none">
            <h6 class="display-4 text-center">Agregar Categoría</h6>
                <form class="form" id="formularioCategoria">
                    <label for="nombreCategoria">Nombre : </label>
                    <input type="text" name="nombreCategoria" class="form-control">
                    <hr>
                    <input type="hidden" name="accion" value="insertar">
                    <input type="submit" class="btn btn-primary bordeBot" id="insertar" value="Agregar Categoria">
                </form>
            </div>
            <div class="row">
                <div class="offset-8 col-2-s-1">
                    <div class="btn btn-primary btn-block" id="agregaCategoria">
                        <i class="fas fa-plus"></i> Agregar</div>
                </div>
            </div>
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
            $resultado=mysqli_query($cn,"select * from categoria");
            while($fila=mysqli_fetch_array($resultado)){
                echo"<tr>";
                    echo"<td>".$fila['idCategoria']."</td>";
                    echo"<td>".$fila['nombreCategoria']."</td>";
                    echo"<td><div class=\"container\"><div class='btn btn-success editar' data-id='".$fila['idCategoria']."'><i class='fas fa-pen'></i> Editar&nbsp &nbsp</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idCategoria']."'><i class='fas fa-trash'></i> Eliminar</div></div></td>";
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
    <?php include_once("../layout/footer2.php"); ?>

    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script>

        //DataTables
        $("#tablaCategoria").dataTable({
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
                url: "accionesCategoria.php",
                data: categoria,
                success: function(){
                    window.location.replace("categorias.php");
                }
            });
        });
        //editar un categoria
        $(".editar").on("click",function(){
            var idcategoria=$(this).data("id");
            console.log(idcategoria);
            $(".modal").load("modalCategoria.php",{"accion":"editar","idCategoria":idcategoria});
            $(".modal").modal();

        });

        // Insertar
        $("#insertar").on("click", function() {
            $("#formularioCategoria").validate({
                rules: {
                    nombreCategoria: {
                        required: true,
                        minlength: 2,
                    },
                },
                messages: {
                    nombreCategoria: {
                        required: "El nombre es requerido",
                        minlength: "Debe contener mínimo 2 caracteres ",
                    },
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function(error,
                    element) {
                    error.insertAfter(element);
                },
                submitHandler: function() {
                    var parametros = $("#formularioCategoria").serialize();
                    console.log(parametros)
                    $.ajax({
                        url: "accionesCategoria.php",
                        type: 'POST',
                        data: parametros,
                        success: function (respuesta) {
                            window.location.replace("categorias.php");
                        }
                    });
                }
            });
        });
        //agregar una nueva categoria
        // $("#insertar").on("click",function(){
        //     var parametros=$("#formularioCategoria").serialize();
        //     console.log(parametros);
        //     $.ajax({
        //         method: "POST",
        //         url: "accionesCategoria.php",
        //         data: parametros,
        //         success: function(){
        //             window.location.replace("categorias.php");
        //         }
        //     });
        // });

        //boton agregar categoria
        //C
        $("#agregaCategoria").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
</body>

</html>