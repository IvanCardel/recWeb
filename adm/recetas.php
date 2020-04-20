<?php 
    $mysqli = new mysqli("localhost","root","","recetario");
?>
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
 <!-- Proteccion -->
 <?php require_once("Proteccion.php") ?>
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <!-- Contenido -->
  <div align="center" class="container">                        
    <p>Seleccione un pais del siguiente menú:</p>
    <p>Países:
      <select>
        <option value="0">Seleccione:</option>
        <?php
          $query = $mysqli -> query ("SELECT * FROM pais");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idPais].'">'.$valores[nombrePais].'</option>';
          }
        ?>
      </select>
      <div class="row">
                        <div class="offset-5 col-2">
                            <input type="submit" value="Enviar" class="btn btn-primary btn-block" id="enviar">
                        </div>
                    </div>
    </p>
  </div>

  
  <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>