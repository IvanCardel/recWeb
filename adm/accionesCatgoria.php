<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");

    if(isset($accion)){
        switch($accion){
            case "borrar":{
           
                $idCategoria=$_POST["idCategoria"];
                require_once("../conec.php");
                //C    
                if(mysqli_query($cn,"delete from categoria where idCategoria=".$idCategoria)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "editar":{
                //C
                if(!isset($_POST["nombreCategoria"]) OR $_POST["nombreCategoria"]==""){
                    die("no hay nombre");
                }
                //C
                if(!isset($_POST["idCategoria"]) OR $_POST["idCategoria"]==""){
                    die("no hay id");
                }

                //C
                $nombreCategoria=$_POST["nombreCategoria"];
                //C
                $idCategoria=$_POST["idCategoria"];
                require_once("../conec.php");
                //C
                if(mysqli_query($cn,"update categoria set nombreCategoria='$nombreCategoria' where idCategoria=".$idCategoria)){
                    //C
                    echo"Categoria Insertada";
                }
                else{
                    //C
                    echo"Categoria No Insertada";
                }
            }break;
            case "insertar":{
                //C
                if(!isset($_POST["nombreCategoria"]) OR $_POST["nombreCategoria"]==""){
                    die("no hay nombre");
                }
                //C
                $nombreCategoria=$_POST["nombreCategoria"];
                require_once("../conec.php");
                //C
                if(mysqli_query($cn,"insert into categoria (nombreCategoria) values('".$nombreCategoria."')")){
                    //C
                    echo"categoria Insertada";
                }
                else{
                    //C
                    echo"Categoria No Insertada";
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