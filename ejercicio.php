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