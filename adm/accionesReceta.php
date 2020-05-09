<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");

    if(isset($accion)){
        switch($accion){
            case "borrar":{
                //C
                $idReceta=$_POST["idReceta"];
                require_once("../conec.php");
                //C    
                if(mysqli_query($cn,"delete from receta where idReceta=".$idReceta)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "editar":{
                //Campos de receta
                if(!isset($_POST["nombreReceta"]) OR $_POST["nombreReceta"]==""){
                    die("no hay nombre");
                }
                // Instrucciones
                if(!isset($_POST["instrucciones"]) OR $_POST["instrucciones"]==""){
                    die("no hay instrucciones");
                }
                //Fecha
                if(!isset($_POST["fecha"]) OR $_POST["fecha"]==""){
                    die("no hay fecha");
                }
                //Usuario
                if(!isset($_POST["idUsr"]) OR $_POST["idUsr"]==""){
                    die("no hay usuario");
                }
                //Categoria
                if(!isset($_POST["idCategoria"]) OR $_POST["idCategoria"]==""){
                    die("no hay categoria");
                }
                //Foto
                if(!isset($_POST["foto"]) OR $_POST["foto"]==""){
                    die("no hay foto");
                }

                //País
                if(!isset($_POST["idPais"]) OR $_POST["idPais"]==""){
                    die("no hay pais");
                }
                // Variables
                $idReceta=$_POST["idReceta"];
                $nombreReceta=$_POST["nombreReceta"];
                $instrucciones=$_POST["instrucciones"];
                $fecha=$_POST["fecha"];
                $idUsr=$_POST["idUsr"];
                $idCategoria=$_POST["idCategoria"];
                $foto=$_POST["foto"];
                $idPais=$_POST["idPais"];
               
                require_once("../conec.php");
                if(mysqli_query($cn,"update receta set nombreReceta='$nombreReceta' , instrucciones='$instrucciones' , fecha='$fecha' , idUsr='$idUsr', idCategoria='$idCategoria', foto='$foto', idPais='$idPais'  where idReceta=".$idReceta)){
                    echo"Receta Insertada";
                }
                else{
                    echo"Receta No Insertada";
                }
            }break;
            // Aquí viene lo bueno de insertar la receta 
            case "insertar":{
                //Nombre de la receta
                if(!isset($_POST["nombreReceta"]) OR $_POST["nombreReceta"]==""){
                    die("no hay nombre");
                }

                //Instrucciones 
                if(!isset($_POST["instrucciones"]) OR $_POST["instrucciones"]==""){
                    die("no hay instrucciones");
                }

                //Fecha
                if(!isset($_POST["fecha"]) OR $_POST["fecha"]==""){
                    die("no hay fecha");
                }

                //Usuario
                if(!isset($_POST["idUsr"]) OR $_POST["idUsr"]==""){
                    die("no hay usuario");
                }

                //Categoria
                if(!isset($_POST["idCategoria"]) OR $_POST["idCategoria"]==""){
                    die("no hay categoria");
                }

                //Foto
                if(!isset($_POST["foto"]) OR $_POST["foto"]==""){
                    die("no hay foto");
                }

                //País
                if(!isset($_POST["idPais"]) OR $_POST["idPais"]==""){
                    die("no hay pais");
                }


                // Variables
                $nombreReceta=$_POST["nombreReceta"];
                $instrucciones=$_POST["instrucciones"];
                $fecha=$_POST["fecha"];
                $idUsr=$_POST["idUsr"];
                $idCategoria=$_POST["idCategoria"];
                $foto=$_POST["foto"];
                $idPais=$_POST["idPais"];

                require_once("../conec.php");
                //C Agregamos unidad de medida al insert
                if(mysqli_query($cn,"insert into receta (nombreReceta, instrucciones, fecha, idUsr, idCategoria, foto, idPais ) values('".$nombreReceta."','".$instrucciones."','".$fecha."','".$idUsr."','".$idCategoria."','".$foto."','".$idPais."')")){
                    echo"Ingrediente Insertado";
                }
                else{
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