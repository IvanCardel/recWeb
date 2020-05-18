<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");
    
    if(isset($accion)){
        switch($accion){
            case "borrar":{
                $idIngrediente=$_POST["idIngrediente"];
                require_once("../conec.php");    
                if(mysqli_query($cn,"delete from ingrediente where idIngrediente=".$idIngrediente)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "editar":{
                if(!isset($_POST["idIngrediente"]) OR $_POST["idIngrediente"]==""){
                    die("no hay id");
                }
                if(!isset($_POST["nombreIngrediente"]) OR $_POST["nombreIngrediente"]==""){
                    die("no hay nombre");
                }
                if(!isset($_POST["unidadMedida"]) OR $_POST["unidadMedida"]==""){
                    die("no hay unidad");
                }

                $idIngrediente=$_POST["idIngrediente"];
                $nombreIngrediente=$_POST["nombreIngrediente"];
                $unidadMedida= $_POST["unidadMedida"];
                require_once("../conec.php");
                if(mysqli_query($cn,"update ingrediente set nombreIngrediente='$nombreIngrediente' where idIngrediente=".$idIngrediente)){
                    echo"ingrediente Insertado";
                }
                else{
                    echo"ingrediente No Insertado";
                }
                if(mysqli_query($cn,"update ingrediente set unidadMedida='$unidadMedida' where idIngrediente=".$idIngrediente)){
                    echo"ingrediente Insertado";
                }
                else{
                    echo"ingrediente No Insertado";
                }
            }break;
            case "insertar":{
                if(!isset($_POST["nombreIngrediente"]) OR $_POST["nombreIngrediente"]==""){
                    die("no hay nombre");
                }
                if(!isset($_POST["unidadMedida"]) OR $_POST["unidadMedida"]==""){
                    die("no hay unidad");
                }
                $idIngrediente=$_POST["idIngrediente"];
                $nombreIngrediente=$_POST["nombreIngrediente"];
                $unidadMedida= $_POST["unidadMedida"];
                require_once("../conec.php");
                if(mysqli_query($cn,"insert into ingrediente (nombreIngrediente) values('".$nombreIngrediente."')")){
                    echo"ingrediente Insertado";
                }
                else{
                    echo"ingrediente No Insertado";
                }
                if(mysqli_query($cn,"insert into ingrediente (unidadMedida) values('".$unidadMedida."')")){
                    echo"ingrediente Insertado";
                }
                else{
                    echo"ingrediente No Insertado";
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