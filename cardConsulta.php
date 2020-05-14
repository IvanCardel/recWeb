<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo.css">
    <link  rel="icon"   href="image/go.ico"/>
    <title>Inicio</title>
</head>

<body>
    <!-- Link para ir abajo -->
<a name="index"></a>
<!-- Fondo de imágen de la página -->
<div class="bg">
    <!--- Carrusel -->
    <?php include_once("layout/slide.php");?>
    <!-- Navabar -->
    <?php include_once("layout/navbar.php");?>
    <!-- Aquí genero el card donde muestro únicamente la receta seleccionada en el index -->
    <?php
    // Requerimos conexión a la vase de datos
    require_once("conec.php");
    // Obtenemos el id para poder identificar la receta que queremos mostrar.
    $idReceta = $_GET["idReceta"];
    // Si pasa el idReceta
    // echo$idReceta;
    // Consulta que me regresa los datos de la receta seleccionada, este es una consulta más detallada,
    // ya que cuenta con la información de 5 tablas unidas por inner join.
    // la condición es que obtenga los datos de la receta cuyo id obtenemos por el método get.
    $resultado=mysqli_query($cn,"SELECT 
    rec.nombreReceta, cat.nombreCategoria, rec.fecha, pa.nombrePais, 
    ing.nombreIngrediente, ing.unidadMedida, deting.cantidad, rec.instrucciones 
    from 
    receta rec 
    inner join detalleingrediente deting ON (rec.idReceta = deting.idReceta) 
    inner join ingrediente ing on (ing.idIngrediente = deting.idIngrediente) 
    inner join categoria cat on (cat.idCategoria = rec.idCategoria) 
    inner join pais pa on (pa.idPais = rec.idPais) where rec.idReceta = $idReceta");
    // Aquí el while se encarga de hacer el recorrido de la receta seleccionada y lo muestra en el card
    while($fila=mysqli_fetch_array($resultado)){
        //Card con el contenido de la base de datos, obtiene lo necesario para mostrar todo lo requerido por una 
        // Receta, en la parte de los ingredientes , ocupamos un foreach para mostrar los datos de una 
        // manera ordenada,
        echo"
        <div class=\"container\">
            <div class=\"card cardini as mt-4\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-6\">
                            <tr>
                            <td><h2>Receta: ".$fila['nombreReceta']."</h2></td>
                            <td><h3 class=\"card-subtittle mb-2 text-muted\">Categoría: ".$fila['nombreCategoria']."</h3></td>
                            <td class=\"card-text\">Fecha: ".$fila['fecha']."</td>
                            <br>
                            <td class=\"card-text\">País: ".$fila['nombrePais']."</td>
                            <br>
                            <td> 
                                <table class=\"table mt-1\">
                                    <thead>
                                        <tr>
                                            <th>Ingredientes</th>
                                            <th>Unidad de Medida</th>
                                            <th>Cantidad</th>
                                        </tr>
                                    </thead>";
                                    // Barrido de los ingredientes para llenar la tabla
                                    foreach ($resultado as $key => $fila)
                                    {
                                        echo"
                                        <tbody>
                                            <td class=\"card-text\">".$fila['nombreIngrediente']."</td>
                                            <td class=\"card-text\">".$fila['unidadMedida']."</td>
                                            <td class=\"card-text\">".$fila['cantidad']."</td>
                                        ";
                                    }
                                    echo"
                                    </tbody>
                                </table>
                                <td class=\"card-text\">Instrucciones: ".$fila['instrucciones']."</td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>";
    }
    ?>
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