<?php require_once("Proteccion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <link  rel="icon"   href="../image/go.ico"/>
    <title>Inicio</title>
</head>

<body>
<a name="index"></a>
    <div class="bg4">
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido del index -->
    <div class="container mt-5">
    <h1 class="text-light">Bienvenido</h1>
        <div class="row">
            <div class="col-6">
                <!-- Card de total recetas -->
                <div class="card cardini2 text-white bg-primary mb-3">
                    <div class="card-header nvb1">Total de Recetas</div>
                    <div class="card-body">
                    <?php 
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"select nombreReceta from receta");
                    while($fila=mysqli_fetch_array($resultado))
                    {
                        echo"<td>* ".$fila['nombreReceta']."</td>";
                        echo"<p>";
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Card de última receta -->
                <div class="card cardini2 text-white cu mb-3">
                    <div class="card-header nvb2">Última Receta</div>
                    <div class="card-body">
                    <?php 
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"select * from receta order by (idReceta)desc");
                    if($fila=mysqli_fetch_array($resultado))
                    {
                        echo"<td>* ".$fila['nombreReceta']."</td>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <!-- Card de paises totales -->
                <div class="card cardini2 text-white cd mb-3">
                    <div class="card-header nvb3">Paises Totales</div>
                    <div class="card-body">
                    <?php 
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"select nombrePais from pais");
                    while($fila=mysqli_fetch_array($resultado))
                    {
                        echo"<td>* ".$fila['nombrePais']."</td>";
                        echo"<p>";
                    }
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <!-- Card de ingredientes totales -->
                <div class="card cardini2 text-white it mb-3">
                    <div class="card-header nvb4">Ingredientes Totales</div>
                    <div class="card-body">
                    <?php 
                    require_once("../conec.php");
                    $resultado=mysqli_query($cn,"select nombreIngrediente from ingrediente");
                    while($fila=mysqli_fetch_array($resultado))
                    {
                        echo"<td>* ".$fila['nombreIngrediente']."</td>";
                        echo"<p>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php include_once("../layout/footer.php"); ?>

    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>