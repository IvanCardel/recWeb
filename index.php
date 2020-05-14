<!DOCTYPE html>
<html lang="en">
<!-- El encabezado obtiene entre otras cosas el formato de 
caracteres que admite la página web, la hoja de estilos y el ícono 
de la página web -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link  rel="icon"   href="image/go.ico"/>
    <title>Inicio</title>
</head>

<!-- Inicia la parte de contenido -->
<body>
<a name="index"></a>
<!-- Contiene la imágen de fondo -->
<div class="bg">
    <!--- Carrusel -->
    <?php include_once("layout/slide.php");?>
    <!-- navabar -->
    <?php include_once("layout/navbar.php");?>
    <!-- Card -->
    <?php include_once("cardsIniciales.php");?>
    <br>
    </div>
        <!-- Codigo Footer -->
        <?php include_once("layout/footer.php");?>
        <!-- js -->
        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/all.min.js"></script>
</body>

</html>