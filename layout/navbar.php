<!-- NavBar, contiene sus propiedades y clases sportadas por bootstrap 
para un mejor diseño y aplicación -->
<nav class="navbar navbar-expand-lg navbar-dark bbb sticky-top">
  <a class="navbar-brand correoFooter" href="adm/index.php">Recetario</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Enlaces -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
      <!-- Index, recarga la página -->
        <a class="nav-link correoFooter text-white" href="index.php"><i class="fas fa-home"></i> Inicio</a>
      </li>
      <!-- Esto es un menú desplegable hacia abajo, muestra las categorías disponibles -->
      <li class="nav-item dropdown">
      <!-- Es un enlace al archivo recetaCategoría, se manda el id de la categoría seleccionada -->
        <a class="nav-link dropdown-toggle correoFooter text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-globe-americas"></i> Categorías
        </a>
        <!-- Utilizamos un menú tipo dropdown -->
        <div class="dropdown-menu text-light colorFoo" aria-labelledby="navbarDropdown">
        <?php
        // Comenzamos haciendo conexión a la base de datos
          require_once("conec.php");
        // Se hace un consulta a la tabla categoría, en  $resultado se guarda dicho query 
          $resultado=mysqli_query($cn,"select * from categoria");
          // Ese resultado lo dividimos en filas y, mientras tengamos estas filas
          // Se va a ir llenando el dropdown
          while($fila=mysqli_fetch_array($resultado)){
            // Cada fila es una posible categoría a seleccionar,  cuando obtengamos la deseada
            // Se obtiene el valor de su id y lo mandamos hacia el archivo recetaCategoría para
            // Ser utilizado posteriormente
              echo'<a class="dropdown-item correoFooter  text-white" href="recetaCategoria.php?idCategoria='.$fila['idCategoria'].' ">'.$fila["nombreCategoria"].'</a>';
          }
          ?>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link correoFooter" href="#"><i class="fas fa-balance-scale"></i> Categoria</a>
      </li> -->
      <!-- Tiene la misma función que la opción categoría,
      lo que cambia es que la consulta se hace a la tabla país, y el filtrado es por dicha tabla -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle correoFooter text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-globe-americas"></i> País
        </a>
        <div class="dropdown-menu text-light colorFoo" aria-labelledby="navbarDropdown">
        <?php
          require_once("conec.php");
            $resultado=mysqli_query($cn,"select * from pais");
          while($fila=mysqli_fetch_array($resultado)){
              echo'<a class="dropdown-item correoFooter text-white" href="recetaPais.php?idPais='.$fila['idPais'].'">'.$fila["nombrePais"].'</a>';
          }
          ?>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link correoFooter" href="#"><i class="fas fa-globe-americas"></i> País</a>
      </li> -->
      <!-- Aquí observamos un link hacia el pie de página que es llamado footer,
      nos muestra redes sociales y una ficha de contacto además de un acerca de -->
      <li class="nav-item">
        <a class="nav-link correoFooter text-white" href="#footer"><i class="fas fa-mobile-alt"></i> Contacto</a>
      </li>
      <!-- Es un link al formulario de logueo que es donde vamos a ingresar a la parte de edición -->
      <li class="nav-item">
        <a class="nav-link correoFooter text-white" href="login.php"><i class="fas fa-user-shield"></i> Login</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>