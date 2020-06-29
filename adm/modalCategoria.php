<?php 
    require_once("../conec.php");
    $accion=$_POST["accion"];
    //C
    $idCategoria=$_POST["idCategoria"];
    //C
    $resultado=mysqli_query($cn,"select * from categoria where idCategoria=".$idCategoria);
    while($fila=mysqli_fetch_array($resultado)){
        //C
        $nomCategoria= $fila["nombreCategoria"];
    }
?>
<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <!--C-->
        <h5 class="modal-title">Editar Categoria</h5>
      </div>
      <div class="modal-body">
        <form class="form" id="formularioEditar">
            <!--C-->
            <label for="nombreCategoria">Nombre de la categoría: </label>
            <input type="hidden" name="accion" value="<?php echo$accion ?>">
            <!--C-->
            <input type="hidden" name="idCategoria" value="<?php echo$idCategoria ?>">
            <!--C-->
            <input type="text" name="nombreCategoria" value="<?php echo$nomCategoria ?>" class="form-control">
            <br>
            <!--C-->
            <input type="submit" class="btn btn-primary" value="Editar Categoria" id="botonEditar">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </form>
      </div>
    </div>
</div>
<script>
        //editar un categoria
        // $("#botonEditar").on("click",function(){
        //     var parametros=$("#formularioEditar").serialize();
        //     console.log(parametros);
        //     $.ajax({
        //         method: "POST",
        //         //C
        //         url: "accionesCategoria.php",
        //         data: parametros,
        //         success: function(){
        //             window.location.replace("categorias.php");
        //         }
        //     });
        // });


         // Insertar
        $("#botonEditar").on("click", function() {
            $("#formularioEditar").validate({
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
                    var parametros = $("#formularioEditar").serialize();
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
</script>
