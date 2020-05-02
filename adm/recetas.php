<?php require_once("Proteccion.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Recetario</title>
</head>

<body>
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
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
                require_once("../conec.php");
                $resultado=mysqli_query($cn,"select * from usuario");
                if($fila=mysqli_fetch_array($resultado))
                {
                    echo"<td class=\"letracard\"> ".$fila['usr']."</td>";
                }
            ?>
            </div>
        </div>
    </div>

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
            delay: 5000
        });
    </script>
</body>

</html>