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
                // tomamos esta variable de la sesión iniciada
                $idUsr=$_SESSION['usuario'];
                // archivo foto
                $archivo = (isset($_FILES['foto'])) ? $_FILES['foto'] : null;
       
                 if ($archivo) {
                    $nombreArchivo = $_FILES['foto']['name'];
                    $rutaArchivo = "../image/receta/".$nombreArchivo;
                    $archivoOk = move_uploaded_file($archivo['tmp_name'], $rutaArchivo);
                 } 
                //  ejecuta el insert
                mysqli_query($cn,"insert into receta(nombreReceta,instrucciones,fecha,idUsr,idCategoria,foto,idPais) values('$nombreReceta','$instrucciones',now(),$idUsr,$idCategoria,'$nombreArchivo',$idPais)");
                // Regresamos al archivo de recetas
                header("location:recetas.php");   
            }break;
             case "editar":{
                //  Si elegimos editar entra aquí
                if(!isset($_POST["nombreReceta"]) OR $_POST["nombreReceta"]==""){
                    die("no hay nombre");
                }
                // Instrucciones
                if(!isset($_POST["instrucciones"]) OR $_POST["instrucciones"]==""){
                    die("no hay instrucciones");
                }
                //Categoria
                if(!isset($_POST["idCategoria"]) OR $_POST["idCategoria"]==""){
                    die("no hay categoria");
                }

                //País
                if(!isset($_POST["idPais"]) OR $_POST["idPais"]==""){
                    die("no hay pais");
                }
                // Variables
                $idReceta=$_POST["idReceta"];
                $nombreReceta=$_POST["nombreReceta"];
                $instrucciones=$_POST["instrucciones"];
        
                $idUsr=$_SESSION['usuario'];
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
            default:{
                echo"funcion no encontrada";
            }        
        }
    }else{
        echo"Funcion no encontrada";
    }
?>