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


<?php 
        require_once("conec.php");
        $resultado=mysqli_query($cn,"select * from receta A inner join pais B on (A.idPais = B.idPais) order by (idReceta)desc , fecha, foto");
        while($fila=mysqli_fetch_array($resultado))
        {

        
?>
    <td>
    <img src="<?php echo $fila['foto']; ?>"  width='85' height='85'  />
    </td>
    <?php
}
        
?>