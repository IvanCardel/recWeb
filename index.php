<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Inicio</title>
</head>

<body>
    <!--- Carrusel -->
    <?php
        include_once("layout/slide.php");
    ?>
    <!-- navabar -->
    <?php
        include_once("layout/navbar.php");
    ?>

    <?php 
        require_once("conec.php");
        $resultado=mysqli_query($cn,"select * from receta A inner join pais B on (A.idPais = B.idPais) order by (idReceta)desc , fecha, foto");
        while($fila=mysqli_fetch_array($resultado))
        {
            echo'<div class="container">';
                echo'<div class="card mt-4">';
                    echo'<div class="card-body">';
                        echo'<div class="row">';
                            echo'<div class="col-6">';
                                echo"<tr>";
                                    echo"<td> <h5> Nombre de la receta: ".$fila['nombreReceta']."</h5></td>";
                                    echo"<br>";
                                    echo"<td> <h6 class='card-subtitle mb-2 text-muted'> Fecha: ".$fila['fecha']."</h6></td>";
                                    echo"<br>";
                                    echo"<p class='card-text'> País:  ".$fila['nombrePais']."  </p>";
                                echo"</tr>";
                                    echo"<br>";
                            echo"</div>";
                            echo"<div class=' offset-2 col-4'>";
                                
                                echo"<img src= 'data:image/png;base64,      ".$fila['foto'].' " class=img-fluid" alt="HolaMundo">';
                            echo"</div>";
                        echo"</div>";
                    echo"</div>";
                echo"</div>";
            echo"</div>";
        }
    ?>
    <br>
    <br>
    <br>
    <!-- Codigo Footer -->
    <div class="container-fluid bg-dark text-white">
        <div class="row pt-4">
            <div class="col-6">
                <h4>Acerca de</h4>
                <p>Esto es un citio web de un proyecto escolar, consiste en un menú de recetas en el que podemos
                    almacenar nuestras recetas de una manera sencilla.</p>
            </div>

            <div class="col-6">
                <h4>Contacto</h4>
                <ul>
                    <li><a href="mailto:correo1@dominio.ext" class="correoFooter">correo1@dominio.ext</a></li>
                    <li><a href="mailto:correo2@dominio.ext" class="correoFooter">correo2@dominio.ext</a></li>
                    <li><a href="mailto:correo3@dominio.ext" class="correoFooter">correo3@dominio.ext</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center pt-2 pb-2">
                &copy Sergio Garcia
            </div>
        </div>
    </div>

    <script src="js/jquery-3.1.1.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/all.min.js"></script>
</body>

</html>