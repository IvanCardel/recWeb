<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");

    if(isset($accion)){
        switch($accion){
            case "borrar":{
                //C
                $idIngrediente=$_POST["idIngrediente"];
                require_once("../conec.php");
                //C    
                if(mysqli_query($cn,"delete from ingrediente where idIngrediente=".$idIngrediente)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "editar":{
                //C
                if(!isset($_POST["nombreIngrediente"]) OR $_POST["nombreIngrediente"]==""){
                    die("no hay nombre");
                }
                //C
                if(!isset($_POST["idIngrediente"]) OR $_POST["idIngrediente"]==""){
                    die("no hay id");
                }
                //Agregamos unidad de medida
                if(!isset($_POST["unidadMedida"]) OR $_POST["unidadMedida"]==""){
                    die("no hay ingrediente");
                }

                //C
                $nombreIngrediente=$_POST["nombreIngrediente"];
                //Agregamos unidad de medida
                $unidadMedida=$_POST["unidadMedida"];
                //C
                $idIngrediente=$_POST["idIngrediente"];
                require_once("../conec.php");
                //c Agregamos la unidad de medida al query
                if(mysqli_query($cn,"update ingrediente set nombreIngrediente='$nombreIngrediente' , unidadMedida='$unidadMedida'  where idIngrediente=".$idIngrediente)){
                    //C
                    echo"Ingrediente Insertado";
                }
                else{
                    //C
                    echo"Ingrediente No Insertado";
                }
            }break;
            case "insertar":{
                //C
                if(!isset($_POST["nombreIngrediente"]) OR $_POST["nombreIngrediente"]==""){
                    die("no hay nombre");
                }
                //C Unidad de medida
                if(!isset($_POST["unidadMedida"]) OR $_POST["unidadMedida"]==""){
                    die("no hay unidad");
                }
                //C agregamos unidad de medida 
                $nombreIngrediente=$_POST["nombreIngrediente"];
                $unidadMedida=$_POST["unidadMedida"];
                require_once("../conec.php");
                //C Agregamos unidad de medida al insert
                if(mysqli_query($cn,"insert into ingrediente (nombreIngrediente, unidadMedida) values('".$nombreIngrediente."','".$unidadMedida."')")){
                    //C
                    echo"ingrediente Insertado";
                }
                else{
                    //C
                    echo"Ingrediente No Insertado";
                }       
            }break;

            default:{
                echo"funcion no encontrada";
            }        
        }
    }else{
        echo"Funcion no encontrada";
    }
?>