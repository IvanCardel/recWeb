<?php require_once("Proteccion.php") ?>
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
    <!-- Imágen de fondo -->
    <div class="bg1">
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
    <div class="container te pt-5">
    <h1>Ingredientes</h1>
        <div class="jumbotron col-10 container bg-warning" id="formulario" style="display:none">
        <!-- Alta ingredientes -->
        <h6 class="display-4 text-center">Agregar Ingrediente</h6>
                 <!-- Aquí cambio el id del formulario país por el de ingrediente-->
            <form class="form" id="formularioIngrediente">
                <!-- C agregar nombre de ingrediente-->
                <label for="nombreIngrediente">Nombre : </label>
                <input type="text" name="nombreIngrediente" class="form-control">
                <br>
                <label for="unidadMedida">Unidad de Medida : </label>
                <input type="text" name="unidadMedida" class="form-control">
                <hr>
                <input type="hidden" name="accion" value="insertar">
                 <!-- C-->
                <input type="submit" class="btn btn-primary" id="insertar" value="Agregar Ingrediente">
            </form>
        </div>
        <div class="row">
            <div class="offset-8 col-2-s-1">
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
        $resultado=mysqli_query($cn,"SELECT * FROM ingrediente");
        while($fila=mysqli_fetch_array($resultado)){
            echo"<tr>";
                //C
                echo"<td>".$fila['idIngrediente']."</td>";
                //C
                echo"<td>".$fila['nombreIngrediente']."</td>";
                //C Agregamos unidad de medida 
                echo"<td>".$fila['unidadMedida']."</td>";
                //C UdM 
                echo"<td><div class=\"container\"><div class='btn btn-success editar' data-id='".$fila['idIngrediente']."'><i class='fas fa-pen'></i> Editar&nbsp &nbsp</div> &nbsp <div class='btn btn-danger borrar' data-id='".$fila['idIngrediente']."'><i class='fas fa-trash'></i> Eliminar</div></div></td>";
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
        $("#tablaIngrediente").dataTable({
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
        // Borrar
        $(".borrar").on("click",function(){
            var ingrediente={
                idIngrediente:$(this).data("id"),
                accion:"borrar",
            };
            $.ajax({
                method: "POST",
                url: "accionesIngrediente.php",
                data: ingrediente,
                success: function(){
                    window.location.replace("ingredientes.php");
                }
            });
        });
        // Editar
        $(".editar").on("click",function(){
            var idingrediente=$(this).data("id");
            console.log(idingrediente);
            $(".modal").load("modalIngrediente.php",{"accion":"editar","idIngrediente":idingrediente});
            $(".modal").modal();
        });

        // Insertar
        $("#insertar").on("click", function() {
            $("#formularioIngrediente").validate({
                rules: {
                    nombreIngrediente: {
                        required: true,
                        minlength: 2,
                    },
                    unidadMedida: {
                        required: true,
                        minlength: 1,
                        number: true,
                    },
                },
                messages: {
                    nombreIngrediente: {
                        required: "El nombre es requerido",
                        minlength: "Debe contener mínimo 2 caracteres ",
                    },
                    unidadMedida: {
                        required: "La unidad es requerida",
                        minlength: "Debe contener mínimo 1 dígito",
                        number: "Ingresa un número válido",
                    },
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function(error,
                    element) {
                    error.insertAfter(element);
                },
                submitHandler: function() {
                    var parametros = $("#formularioIngrediente").serialize();
                    console.log(parametros)
                    $.ajax({
                        url: "accionesIngrediente.php",
                        type: 'POST',
                        data: parametros,
                        success: function (respuesta) {
                            window.location.replace("ingredientes.php");
                        }
                    });
                }
            });
        });

        //agregar un ingrediente
        // $("#insertar").on("click",function(){
        //     //C
        //     var parametros=$("#formularioIngrediente").serialize();
        //     console.log(parametros);
        //     $.ajax({
        //         method: "POST",
        //         //C
        //         url: "accionesIngrediente.php",
        //         data: parametros,
        //         success: function(){
        //             //C
        //             window.location.replace("ingredientes.php");
        //         }
        //     });
        // });

        //boton agregar ingrediente
        $("#agregaIngrediente").on("click",function(){
            $("#formulario").toggle("slow");
        });
    </script>
</body>

</html>