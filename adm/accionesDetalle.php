<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");

    if(isset($accion)){
        switch($accion){
            case "insertar":{          
                
                if(!isset($_POST["idReceta"]) OR $_POST["idReceta"]==""){
                    die("no hay unidad");
                }  
                if(!isset($_POST["idIngrediente"]) OR $_POST["idIngrediente"]==""){
                    die("no hay unidad");
                }
                if(!isset($_POST["cantidad"]) OR $_POST["cantidad"]==""){
                    die("no hay unidad");
                }
                $idReceta=$_POST["idReceta"];
                $idIngrediente=$_POST["idIngrediente"];
                $cantidad=$_POST["cantidad"];
                
                require_once("../conec.php");
                //C Agregamos unidad de medida al insert
                if(mysqli_query($cn,"insert into detalleingrediente (idReceta, idIngrediente, cantidad) values ('".$idReceta."','".$idIngrediente."','".$cantidad."')")){
                    header("detalleIngrediente.php?idReceta=$$idReceta"); 

                    
                    echo"ingrediente Insertado";
                }
                else{
                    //C
                    echo"Ingrediente No Insertado";
                }
                header("detalleIngrediente.php?idReceta=$$idReceta");       
            }break;

            default:{
                echo"funcion no encontrada";
            }        
        }
    }else{
        echo"Funcion no encontrada";
    }
?>