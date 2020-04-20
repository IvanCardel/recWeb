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
    

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                    <?php 
                    require_once("conec.php");
                    $resultado=mysqli_query($cn,"select * from receta A inner join pais B on (A.idPais = B.idPais) order by (idReceta)desc , fecha");
                    if($fila=mysqli_fetch_array($resultado))
                    {
                        echo"<tr>";
                        echo"<td> <h5> Nombre de la receta: ".$fila['nombreReceta']."</h5></td>";
                        echo"<br>";
                        echo"<td> <h6 class='card-subtitle mb-2 text-muted'> Fecha: ".$fila['fecha']."</h6></td>";
                        echo"<br>";
                        echo"<p class='card-text'> País:  ".$fila['nombrePais']."  </p>";
                        echo"</tr>";
                        echo"<br>";
                    }
                    ?>
                    </div>
                    <div class=" offset-2 col-4">
                        <img src="image/1.png" class="img-fluid" alt="HolaMundo">
                    </div>
                </div>
            </div>

        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d933.9237358489584!2d-100.86588537083945!3d20.559658854826942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x842cbb352c603d93%3A0xeef7cc8bfc02a292!2sVilla%20de%20Her%C3%B3n%20104%2C%20Villas%20del%20Bajio%20I%2C%20Celaya%2C%20Gto.!5e0!3m2!1ses!2smx!4v1587358016321!5m2!1ses!2smx" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
<br>
<br>
<br>
    <!-- Codigo Footer -->
    <div class="container-fluid bg-dark text-white">
        <div class="row pt-4">
            <div class="col-6">
                <h4>Acerca de</h4>
                <p>Esto es un citio web de un proyecto escolar, consiste en un menú de recetas en el que podemos almacenar nuestras recetas de una manera sencilla.</p>
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
