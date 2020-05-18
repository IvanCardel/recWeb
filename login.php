<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title> Login
    </title>
</head>

<body>
    <!--- Carrusel -->
    <?php include_once("layout/slide.php"); ?>
    <!-- navabar -->
    <?php include_once("layout/navbar.php"); ?>
    <!-- Contenido -->
    <div class="container pt-5">
        <div class="jumbotron  jb">
        <!-- <img src="image/login.png" style="max-width:15%;width:auto;height:auto" class="rounded mx-auto d-block"  alt="No found"> -->
            <h3 class="display-4 text-center text-white"> Ingresar</h3>
            <form class="form" id="login">
                <div class="container">
                    <!-- inicio input-->
                    <label class="sr-only" for="user"> Usuario</label>
                    <div class="offset-2  input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-user fa-lg"></i>
                            </div>
                        </div>
                        <input type="text" class="form-control col-form-label-lg inputform" name="usuario" id="usuario" placeholder="Usuario">
                    </div>
                    <br>
                    <!-- termino input-->
                    <label class="sr-only" for="pass"> Contraseña</label>
                    <div class="offset-2 input-group">
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <i class="fas fa-key fa-lg"></i>
                            </div>
                        </div>
                        <input type="password" class="form-control inputform col-form-label-lg" name="pass" id="pass" placeholder="Contraseña">
                        <br>
                    </div>
                    <br>
                    <div class="row">
                        <div class="offset-8 col-xs-2 col-md-2">
                            <div class="btn btn-danger btn-block" id="mostrar"><i class="fas fa-eye"></i> Mostrar </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-5  col-xs-2 col-md-2">
                            <input type="submit" value="Enviar" class="btn btn-success btn-block" id="enviar">
                        </div>
                        <br>
                    </div>
                    <div class="row" id="mensaje"></div>
                </div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include_once("layout/footer.php"); ?>

    <script src="js/jquery-3.1.1.js">
    </script>
    <script src="js/bootstrap.bundle.min.js">
    </script>
    <script src="js/jquery.validate.min.js">
    </script>
    <script src="js/all.min.js">
    </script>
    <script>
        //Boton Ver Contraseña
        var estadoMostrar = 0;
        $("#mostrar").on("click", function() {

            if (estadoMostrar == 0) {
                $("#pass").attr("type", "text");
                $("#mostrar").removeClass("btn-danger");
                $("#mostrar").addClass("btn-success");
                $("#mensaje").html("<span class='alert alert-info'>la contraseña es visible</span>");
                estadoMostrar = 1;
            } else {
                $("#pass").attr("type", "password");
                $("#mostrar").removeClass("btn-success");
                $("#mostrar").addClass("btn-danger");
                $("#mensaje").html("");

                estadoMostrar = 0;
            }

        });

        //Validacion Formulario
        $("#enviar").on("click", function() {
            $("#login").validate({
                rules: {
                    usuario: {
                        required: true,
                        maxlength: 10,
                        minlength: 5,
                    },
                    pass: {
                        required: true,
                        maxlength: 20,
                        minlength: 5,
                    },
                },
                messages: {
                    usuario: {
                        required: "El usuario es requerido",
                        maxlength: "Debe contener máximo 10 caracteres ",
                        minlength: "Debe contener mínimo 5 caracteres ",
                    },
                    pass: {
                        required: "La contraseña es requerida",
                        maxlength: "Debe contener máximo 10 caracteres ",
                        minlength: "Debe contener mínimo 5 caracteres ",
                    },
                },
                errorElement: "span",
                errorClass: "error",
                errorPlacement: function(error,
                    element) {
                    error.insertAfter(element);
                },
                submitHandler: function() {
                    var parametros = $("#login").serialize();
                    console.log(parametros)
                    $.ajax({
                        url: "checkUsr.php",
                        type: 'POST',
                        data: parametros,
                        success: function (respuesta) {
                            if ($.trim(respuesta) == "T") {
                                document.location.href = "adm/";
                            }
                            else {
                                $("#mensaje").html("<span style='color:red'>Usuario y/o Contraseña invalida</span>")
                            }
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>