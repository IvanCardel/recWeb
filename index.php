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
    <?php include_once("layout/slide.php");?>
    <!-- navabar -->
    <?php include_once("layout/navbar.php");?>

    <?php require_once("conec.php");
    //$resultado=mysqli_query($cn,"select * from receta A inner join pais B on (A.idPais = B.idPais) inner join categoria C on (B.idPais = C.idCategoria)    order by (idReceta)desc ,instrucciones, fecha, foto, nombreCategoria");
    $resultado=mysqli_query($cn,"SELECT  rec.nombreReceta, cat.nombreCategoria, rec.fecha, pa.nombrePais, ing.nombreIngrediente, ing.unidadMedida, deting.cantidad, rec.instrucciones from receta rec inner join detalleingrediente deting ON (rec.idReceta = deting.idReceta) inner join ingrediente ing on (ing.idIngrediente = deting.idIngrediente) inner join categoria cat on (cat.idCategoria = rec.idCategoria) inner join pais pa on (pa.idPais = rec.idPais) ");
    while($fila=mysqli_fetch_array($resultado)){
    echo"
    <div class=\"container\">
        <div class=\"card mt-4\">
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-6\">
                        <tr>
                            <td><h5>Receta: ".$fila['nombreReceta']."</h5></td>
                            <td><h6 class=\"card-subtittle mb-2 text-muted\">Categoría: ".$fila['nombreCategoria']."</h6></td>
                            <td class=\"card-text\">Fecha: ".$fila['fecha']."</td>
                            <td class=\"card-text\">País: ".$fila['nombrePais']."</td>
                            <table class=\"table mt-1\">
                                <thead>
                                    <tr>
                                        <th>Ingredientes</th>
                                        <th>Unidad de Medida</th>
                                        <th>cantidad</th>
                                    </tr>
                                </thead>";
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
                    <!--<div class=\"offset-2 col-4\">-->
                    <!--<img src=\"..\" alt=\"Error\" class=\"img-fluid\">-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    ";
    }
    ?>
        <!-- Codigo Footer -->
        <?php include_once("layout/footer.php");?>

        <script src="js/jquery-3.1.1.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/all.min.js"></script>
</body>

</html>