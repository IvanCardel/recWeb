<?php
    $accion=$_POST["accion"];
    require_once("Proteccion.php");
    if(isset($accion)){
        switch($accion){
            case "borrar":{
                $idReceta=$_POST["idReceta"];
                require_once("../conec.php");
                if(mysqli_query($cn,"delete from detalleingrediente where idReceta=".$idReceta)){
                    echo"valor borrado";
                }else{
                    echo"No se pudo borrar  ";
                }

                if(mysqli_query($cn,"delete from receta where idReceta=".$idReceta)){
                    echo"valor borrado";
                }else{
                    echo"no se pudo borrar";
                }
            }break;
            case "insertar":{
                require_once("../conec.php");
                require_once("Proteccion.php"); 
                $nombreReceta=$_POST['nombreReceta'];
                $instrucciones=$_POST['instrucciones'];
                $idCategoria=$_POST['idCategoria'];
                $idPais=$_POST['idPais'];
                $idUsr=$_SESSION['usuario'];
                $archivo = (isset($_FILES['foto'])) ? $_FILES['foto'] : null;
       
                 if ($archivo) {
                    $nombreArchivo = $_FILES['foto']['name'];
                    $rutaArchivo = "../image/receta/".$nombreArchivo;
                    $archivoOk = move_uploaded_file($archivo['tmp_name'], $rutaArchivo);
                 } 
                mysqli_query($cn,"insert into receta(nombreReceta,instrucciones,fecha,idUsr,idCategoria,foto,idPais) values('$nombreReceta','$instrucciones',now(),$idUsr,$idCategoria,'$nombreArchivo',$idPais)");
                header("location:recetas.php");   
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
            default:{
                echo"funcion no encontrada";
            }        
        }
    }else{
        echo"Funcion no encontrada";
    }
?>