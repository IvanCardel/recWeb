<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    //C
    $idIngrediente=$_POST["idIngrediente"];
    //C
    $resultado=mysqli_query($cn,"select * from ingrediente where idIngrediente=".$idIngrediente);
    while($fila=mysqli_fetch_array($resultado)){
        //C
        $nomIngrediente= $fila["nombreIngrediente"];
        //C
        $uniMedida= $fila["unidadMedida"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <!--C-->
        <h5 class="modal-title">Editar Ingrediente</h5>
      </div>
      <div class="modal-body">
        <form class="form" id="formularioEditar">
        <label for="nombreIngrediente">Nombre del ingrediente: </label>
            <input type="hidden" name="accion" value="<?php echo$accion ?>">
            <input type="hidden" name="idIngrediente" value="<?php echo$idIngrediente ?>">
            <input type="text" name="nombreIngrediente" value="<?php echo$nomIngrediente ?>" class="form-control">
            <br>
            <label for="nombreIngrediente">Unidad de  Medida: </label>
            <input type="text" name="unidadMedida" value="<?php echo$uniMedida ?>" class="form-control">
            <br>
            
            <input type="submit" class="btn btn-primary" value="Editar Ingrediente" id="botonEditar">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
</div>
<script>
    $("#botonEditar").on("click", function() {
        $("#formularioEditar").validate({
            rules: {
                nombreIngrediente: {
                    required: true,
                    minlength: 2,
                },
                unidadMedida: {
                    required: true,
                    minlength: 1,
                },
            },
            messages: {
                nombreIngrediente: {
                    required: "El nombre es requerido",
                    minlength: "Debe contener mínimo 2 caracteres ",
                },
                unidadMedida: {
                    required: "La unidad es requerida",
                    minlength: "Debe contener mínimo una letra",
                },
            },
            errorElement: "span",
            errorClass: "error",
            errorPlacement: function(error,
                element) {
                error.insertAfter(element);
            },
            submitHandler: function() {
                var parametros = $("#formularioEditar").serialize();
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

        //editar un ingrediente
//         $("#botonEditar").on("click",function(){
//             var parametros=$("#formularioEditar").serialize();
//             console.log(parametros);
//             $.ajax({
//                 method: "POST",
//                 //C
//                 url: "accionesIngrediente.php",
//                 data: parametros,
//                 success: function(){
//                     window.location.replace("ingredientes.php");
//                 }
//             });
//         });
</script>
