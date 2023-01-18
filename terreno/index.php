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
    <title>Terreno</title>
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
                <li class="page-item "><a class="page-link" href="/materiales/">Materiales</a></li>
                <li class="page-item active"><a class="page-link" href="/terreno">Terreno</a></li>
            </ul>
        </nav>
        <div class="row">
            <div class="col-sm-4">
                <!-- lote -->
                <div class="card pd-2 " style="width: 18rem;">
                    <div class="card-header">
                        Registro del terreno
                    </div>
                    <form id="terreno" method="post">
                        <div class="card-body">
                            <div id="alert"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Terreno</span>
                                <input type="text" id="t_name" class="form-control" placeholder="Nombre del terreno" name="name" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Hectareas</span>
                                <input type="text" id="t_plant" class="form-control" placeholder="número de hectáreas" name="area" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                            <!--Ingreso caja de seleccion para registrar el (tipo de cultivo)-->
                            <div class="input-group mb-3">
                                <select class="form-select" id="t_cultivo" aria-label="Default select example" name="supplier">
                                    <option selected value="0">Seleccione un tipo de cultivo</option>
                                    <!--EJEMPLOS:-->
                                    <option value="1">Nacional</option>
                                    <option value="2">Criollo</option>
                                    <option value="3">Forastero</option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text">Dimención</span>
                                <input type="text" id="t_dim" class="form-control" id="password" placeholder="X x Y" name="description" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>

                            <div class="input-group mb-3">
                                <input type="submit" class="form-control btn btn-primary" aria-label="Username" aria-describedby="basic-addon1" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-8">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Héctareas</th>
                            <th scope="col">Variedad</th>
                            <th scope="col">Dimenciones</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody id="terreno_item"></tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../static/js/bootstrap.bundle.min.js"></script>
    <script src="../static/jquery/jquery-3.6.0.min.js"></script>
    <script src="../static/js/scripts/main.js" type="module"></script>
</body>

</html>