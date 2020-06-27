<?php
    $accion=$_POST["accion"];
    echo$accion;
    if(isset($accion)){
        switch($accion){
            case "borrar":{
                $idReceta=$_POST["idReceta"];
                $idIngrediente=$_POST["idIngrediente"];
                require_once("../conec.php");
                if(mysqli_query($cn,"DELETE FROM detalleingrediente WHERE idReceta = $idReceta AND  idIngrediente = $idIngrediente")){
                    echo"valor borrado";
                }else{
                    echo"No se pudo borrar  ";
                }
                header("location:detalleIngrediente.php?idReceta=$idReceta");
            }break;
            case "insertar":{          
                $idReceta=$_POST["idReceta"];
                $idIngrediente=$_POST["idIngrediente"];
                $cantidad=$_POST["cantidad"];
                
                require_once("../conec.php");
                if(mysqli_query($cn,"INSERT INTO detalleingrediente 
                (idReceta, idIngrediente, cantidad) 
                values ('.$idReceta.','.$idIngrediente.','.$cantidad.')")){
                echo"Ingrediente Insertado";
               
                }
                else{
                    echo"Ingrediente No Insertado";
                }
                header("location:detalleIngrediente.php?idReceta=$idReceta");
            }break;
            default:{
                echo"funcion no encontrada";
            }        
        }
    }else{
        echo"Funcion no encontrada";
    }
?>