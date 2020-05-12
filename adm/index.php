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
    <h1 class="text-light text-center">Bienvenido</h1>
    <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
        <div class="toast tocard" style="position: absolute; top: 0; right: 0;">
            <div class="toast-header">
                <div class="container">
                    <img src="../image/ivn.jpg" class="img-thumbnail" alt="No found">
                </div>
                <strong class="mr-auto text-dark ">Recetario ha mandado un mensaje</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
            </div>
            <div class="toast-body letracard">
                Bienvenido
                <?php
                if(!isset($_SESSION))
                {
                    session_start();
                } 
                echo "<td class=\"letracard\"> ".$_SESSION["usuario"]."</td>";
                ?>
            </div>
        </div>
    </div>

    <!-- Contenido del index -->
    <div class="container mt-5">
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
    <script>
        $(document).ready(function() {
            $(".toast").toast("show");
        });
        $(".toast").toast({
            delay: 4000
        });
    </script>
</body>

</html>