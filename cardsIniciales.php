<?php require_once("conec.php");

// Consultamos los capmos que necesitamos para el card inicial
    $resultado=mysqli_query($cn,"SELECT * FROM 
    receta INNER JOIN categoria on receta.idCategoria=categoria.idCategoria
    INNER JOIN pais on receta.idPais=pais.idPais
     ");
    
    // Hacemos el barrido de la consulta 
    while($fila=mysqli_fetch_array($resultado)){
    //Card con el contenido de la base de datos 
    echo"
    <div class=\"container\">
        <div class=\"card cardini as mt-4\">
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"col-6\">
                        <tr>
                            <td><h3>Receta: ".$fila['nombreReceta']."</h3></td>
                            <td><h4 class=\"card-subtittle mb-2 text-muted\">Categoría: ".$fila['nombreCategoria']."</h4></td>
                            <td class=\"card-text\">Fecha: ".$fila['fecha']."</td>
                            <br>
                            <td class=\"card-text\">País: ".$fila['nombrePais']."</td>
                            <br>
                            <td>";
                            echo'<a class=\"card-link\"  href="cardConsulta.php?idReceta= '.$fila['idReceta'].' " > Ver más</a>';
                            echo"</td>
                        </tr>
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    }
?>