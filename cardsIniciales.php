<?php require_once("conec.php");

// Consultamos los campos que necesitamos para el card inicial
// Obtenemos campos de distintas tablas por lo que es necesario
// hacer inner join para juntar tablas
    $resultado=mysqli_query($cn,"SELECT * FROM 
    receta INNER JOIN categoria on receta.idCategoria=categoria.idCategoria
    INNER JOIN pais on receta.idPais=pais.idPais order by idReceta
     ");
    
    // Hacemos el barrido de la consulta 
    while($fila=mysqli_fetch_array($resultado)){
    //Card con el contenido de la base de datos
    // Recordamos que este es un card parcial, entonces tiene un href que nos manda a 
    // un archivo llamado cardConsulta.php que será el encargado de mostrar
    //  la receta completa.
    echo"
    <div class=\"container col-8\">
        <div class=\"card cardini as mt-4\">
            <div class=\"card-body\">
                <div class=\"row\">
                    <div class=\"offset-1 col-4-m3-s2\">
                        <tr>
                        <br>
                            <td><h2>".$fila['nombreReceta']."</h2></td>
                            <td><h3 class=\"card-subtittle mb-2 text-dark\">Categoría: ".$fila['nombreCategoria']."</h3></td>
                            <td class=\"card-text\"><p class=\"textoCard\">Fecha:  ".$fila['fecha']."</td>
                            <br>
                            <td class=\"card-text\">País: ".$fila['nombrePais']."</td>
                            <br>
                            <td>";
                            echo'<a class=\"card-link\"  href="cardConsulta.php?idReceta= '.$fila['idReceta'].' " > Ver más</a>';
                            echo"</td>
                        </tr>
                    </div>
                    <div class=\"offset-2 col-4-m3-s2\">
                        <img src='image/receta/".$fila['foto']."' class=\"card-img-top  bg10\" >
                    </div>
                </div>
            </div>
        </div>
    </div>
    ";
    }
?>