<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/datatables.min.css">
    <title>Pais</title>
</head>

<body>
    <!-- Proteccion -->
    <?php require_once("Proteccion.php"); ?>
    <!-- navabar -->
    <?php include_once("../layout/navbaradm.php"); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Total de Recetas</div>
                    <div class="card-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt sint ratione iusto sapiente consequatur. Deleniti non quam natus error quidem! Quos corporis a illo explicabo ad consequuntur porro aut molestias.</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Ultima Receta</div>
                    <div class="card-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt sint ratione iusto sapiente consequatur. Deleniti non quam natus error quidem! Quos corporis a illo explicabo ad consequuntur porro aut molestias.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card text-white bg-secondary mb-3">
                    <div class="card-header">Paises Totales</div>
                    <div class="card-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt sint ratione iusto sapiente consequatur. Deleniti non quam natus error quidem! Quos corporis a illo explicabo ad consequuntur porro aut molestias.</p>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card text-dark bg-ligth mb-3">
                    <div class="card-header">Ingredientes Totales</div>
                    <div class="card-body">
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt sint ratione iusto sapiente consequatur. Deleniti non quam natus error quidem! Quos corporis a illo explicabo ad consequuntur porro aut molestias.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <?php include_once("../layout/footer.php"); ?>

    <script src="../js/jquery-3.1.1.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/datatables.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>