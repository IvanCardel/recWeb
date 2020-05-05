<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand correoFooter" href="#">Recetario</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- Enlaces -->
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link correoFooter" href="index.php"><i class="fas fa-home"></i> Inicio</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle correoFooter" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-globe-americas"></i> Categorías
        </a>
        <div class="dropdown-menu text-light bg-primary " aria-labelledby="navbarDropdown">
        <?php
          require_once("conec.php");
            $resultado=mysqli_query($cn,"select * from categoria");
          while($fila=mysqli_fetch_array($resultado)){
              echo'<a class="dropdown-item correoFooter" href="recetaCategoria.php?idCategoria='.$fila['idCategoria'].' ">'.$fila["nombreCategoria"].'</a>';
          }
          ?>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link correoFooter" href="#"><i class="fas fa-balance-scale"></i> Categoria</a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle correoFooter" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-globe-americas"></i> País
        </a>
        <div class="dropdown-menu text-light bg-primary " aria-labelledby="navbarDropdown">
        <?php
          require_once("conec.php");
            $resultado=mysqli_query($cn,"select * from pais");
          while($fila=mysqli_fetch_array($resultado)){
              echo'<a class="dropdown-item correoFooter" href="recetaPais.php?idPais='.$fila['idPais'].'">'.$fila["nombrePais"].'</a>';
          }
          ?>
        </div>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link correoFooter" href="#"><i class="fas fa-globe-americas"></i> País</a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link correoFooter" href="#footer"><i class="fas fa-mobile-alt"></i> Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link correoFooter" href="login.php"><i class="fas fa-user-shield"></i> Login</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</nav>