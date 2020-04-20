<?php  
    $edad=$_GET["edad"];
    function imprimir(int $edad){
        if($edad >= 18){
            echo"es mayor de edad";
        }        
        else{
            echo"es menor de edad";
        }
    }
    imprimir($edad);

?>




<?php
          $query = $mysqli -> query ("SELECT * FROM categoria");
          while ($valores = mysqli_fetch_array($query)) {
            echo '<option value="'.$valores[idCategoria].'">'.$valores[nombreCategoria].'</option>';
          }
        ?>