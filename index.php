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
                        <h5 class="card-title">Enchiladas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">12 de noviembre de 2019</h6>
                        <p class="card-text"> Pais </p>
                        <a href="#" class="card-link">Ver mas ...</a>
                    </div>
                    <div class=" offset-2 col-4">
                        <img src="image/1.png" class="img-fluid" alt="HolaMundo">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title">Enchiladas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">12 de noviembre de 2019</h6>
                        <p class="card-text"> Pais </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    <div class=" offset-2 col-4">
                        <img src="image/1.png" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>

    </div>


    <div class="container">
        <div class="card mt-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title">Enchiladas</h5>
                        <h6 class="card-subtitle mb-2 text-muted">12 de noviembre de 2019</h6>
                        <p class="card-text"> Pais </p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                    <div class=" offset-2 col-4">
                        <img src="image/1.png" class="img-fluid">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- Codigo Footer -->
    <div class="container-fluid bg-dark text-white">
        <div class="row pt-4">
            <div class="col-6">
                <h4>Acerca de</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque consequuntur modi quis ullam voluptatibus! Ex quod atque hic vel quis provident alias architecto, ad ut incidunt quisquam facilis sapiente maxime.</p>
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