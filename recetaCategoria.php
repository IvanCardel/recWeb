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
    <a name="index"></a>
   
    <div class="bg">
    <!--- Carrusel -->
    <?php include_once("layout/slide.php");?>
    <!-- navabar -->
    <?php include_once("layout/navbar.php");?>
<?php
    require_once("conec.php");
    $idCategoria = $_GET["idCategoria"];
    
    // Qyuery para sacar la consulta del nombre de la categoría    
    $res=mysqli_query($cn,"SELECT  nombreCategoria from categoria where idCategoria = $idCategoria");
    // Imprime nombre de la categoría
    echo"<div class=\"container\">";
    if($fil=mysqli_fetch_array($res))
        echo"<h1  class=\"text-center tituloPa2 text-warning\">~ ".$fil['nombreCategoria']." ~</h1>
    </div>";

    $resultado=mysqli_query($cn,"SELECT * FROM 
    receta INNER JOIN categoria on receta.idCategoria=categoria.idCategoria
    INNER JOIN pais on receta.idPais=pais.idPais where categoria.idCategoria = $idCategoria
    ");

    // Hacemos el barrido de la consulta 
    while($fila=mysqli_fetch_array($resultado)){
        //Card con el contenido de la base de datos 
        echo"
        <div class=\"container\">
            <div class=\"card cardini as mt-4\">
                <div class=\"card-body\">
                    <div class=\"row\">
                        <div class=\"col-6\">
                            <tr>
                                <td><h3>Receta: ".$fila['nombreReceta']."</h3></td>
                                <td><h4 class=\"card-subtittle mb-2 text-muted\">Categoría: ".$fila['nombreCategoria']."</h4></td>
                                <td class=\"card-text\">Fecha: ".$fila['fecha']."</td>
                                <br>
                                <td class=\"card-text\">País: ".$fila['nombrePais']."</td>
                                <br>
                                <td>";
                                echo'<a class=\"card-link\"  href="cardConsulta.php?idReceta= '.$fila['idReceta'].' " > Ver más</a>';
                                echo"</td>
                            </tr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
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