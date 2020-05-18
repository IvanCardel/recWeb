<?php
    $accion=$_POST["accion"];
    echo$accion;
    require_once("Proteccion.php");

    if(isset($accion)){
        switch($accion){
            case "borrar":{
                $idPais=$_POST["idPais"];
                require_once("../conec.php");    
                if(mysqli_query($cn,"delete from pais where idPais=".$idPais)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "editar":{
                if(!isset($_POST["nombrePais"]) OR $_POST["nombrePais"]==""){
                    die("no hay nombre");
                }
                if(!isset($_POST["idPais"]) OR $_POST["idPais"]==""){
                    die("no hay id");
                }

                $nombrePais=$_POST["nombrePais"];
                $idPais=$_POST["idPais"];
                require_once("../conec.php");
                if(mysqli_query($cn,"update pais set nombrePais='$nombrePais' where idPais=".$idPais)){
                    echo"pais Insertado";
                }
                else{
                    echo"Pais No Insertado";
                }
            }break;
            case "insertar":{
                if(!isset($_POST["nombrePais"]) OR $_POST["nombrePais"]==""){
                    die("no hay nombre");
                }
                $nombrePais=$_POST["nombrePais"];
                require_once("../conec.php");
                if(mysqli_query($cn,"insert into pais (nombrePais) values('".$nombrePais."')")){
                    echo"pais Insertado";
                }
                else{
                    echo"Pais No Insertado";
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