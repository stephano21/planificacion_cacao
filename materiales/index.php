<?php
session_start();
//error_reporting(0);
include("../php/scripts/conn.php");
if (!isset($_SESSION['user'])) {
    //echo $_SESSION['user'];
    echo '<script> alert("Por favor, inicia sesión"); 
    window.location = "/"</script>';
}
$usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("../php/partials/header.php") ?>
    <title>Materiales</title>
</head>

<body style="background-color: #ECEAE7;">
    <?php require_once("../php/partials/nav.php") ?>
    <div class="container">
        <div class="input-group mb-3"></div>
        <div class="input-group mb-3"></div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home">Inicio</a></li>
                <li class="page-item"><a class="page-link" href="/planificacion">Planificación</a></li>
                <li class="page-item active"><a class="page-link" href="/materiales/">Materiales</a></li>
                <li class="page-item"><a class="page-link" href="/terreno">Terreno</a></li>
            </ul>
        </nav>
        <div class="row">
            <div class="col-sm-4">
                <div class="card pd-2 " style="width: 18rem;">
                    <div class="card-header">
                        Registro de materiales
                    </div>
                    <form id="material" method="post">
                        <div class="card-body">
                            <div id="alert"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre</span>
                                <input type="text" id="m_name" class="form-control" placeholder="Nombre" name="name" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Descripción</span>
                                <input type="text" id="m_detail" class="form-control" placeholder="Descripción" name="description" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Precio</span>
                                <input type="text" id="m_price" class="form-control" placeholder="Precio" name="price" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Cantidad</span>
                                <input type="text" id="m_quantity" class="form-control" placeholder="Cantidad" name="price" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="m_type" aria-label="Default select example" name="supplier">
                                    <option selected value="0">Seleccione un tipo</option>
                                    <option value="1">Herramienta</option>
                                    <option value="2">Insumo</option>
                                    <option value="3">Otro</option>
                                </select>
                            </div>


                            <div class="input-group mb-3">
                                <input type="submit" class="form-control btn btn-primary" aria-label="Username" aria-describedby="basic-addon1" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="input-group mb-3"></div>
                <div class="input-group mb-3"></div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Herramienta</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Tipo</th>

                        </tr>
                    </thead>
                    <tbody id="materiales">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../static/js/bootstrap.bundle.min.js"></script>
    <script src="../static/jquery/jquery-3.6.0.min.js"></script>
    <script src="../static/js/scripts/main.js" type="module"></script>
</body>

</html>