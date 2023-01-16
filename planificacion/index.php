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
    <title>Planificación</title>
</head>

<body style="background-color: #ECEAE7;">
    <?php require_once("../php/partials/nav.php") ?>
    <div class="container">
        <div class="input-group mb-3"></div>
        <div class="input-group mb-3"></div>
        <nav aria-label="Page navigation example sticky-top">
            <ul class="pagination">
                <li class="page-item "><a class="page-link" href="/home">Inicio</a></li>
                <li class="page-item"><a class="page-link" href="/materiales/">Materiales</a></li>
                <li class="page-item"><a class="page-link" href="/terreno">Terreno</a></li>
                <li class="page-item active"><a class="page-link" href="/planificacion">Planificación</a></li>
            </ul>
        </nav>
        <div class="row">
            <section id="list_planing">
                <div class="direct">
                    <a href="#new_planig"><button class="btn btn-primary" type="button">Añadir Planificación</button></a>
                </div>
                <div class="d-flex align-items-start justify-content-center vh-100">

                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Actividad</th>
                                <th scope="col">Hectareas</th>
                                <th scope="col">Herramientas</th>
                                <th scope="col">Trabajadores</th>
                                <th scope="col">Inicio</th>
                                <th scope="col">Fin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Cosecha 1</th>
                                <td>
                                    <li>Hectarea1</li>
                                    <li>Hectarea2</li>
                                </td>
                                <td>
                                    <li>Material1</li>
                                    <li>Material2</li>
                                </td>
                                <td>
                                    <li>Trabajador1</li>
                                    <li>Trabajador2</li>
                                </td>
                                <td>01/02/2023</td>
                                <td>05/02/2023</td>
                                <td>
                                    <button class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button>
                                    <button class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Poda1 </th>
                                <td>
                                    <li>Hectarea1</li>
                                    <li>Hectarea2</li>
                                </td>
                                <td>
                                    <li>Material1</li>
                                    <li>Material2</li>
                                </td>
                                <td>
                                    <li>Trabajador1</li>
                                    <li>Trabajador2</li>
                                </td>
                                <td>01/02/2023</td>
                                <td>05/02/2023</td>
                                <td>
                                    <button class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </button>
                                    <button class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
        <div class="row">
            <div class="input-group mb-3"></div>
            <div class="input-group mb-3"></div>
            <section id="new_planig">
                <div class="direct">
                    <a href="#list_planing"><button class="btn btn-primary" type="button">Ir a Planificaciones</button></a>
                </div>
                <div class="input-group mb-3"></div>
                <!-- planing -->
                <div class="card pd-2 " style="width: 38rem;">
                    <div class="card-header">
                        Planificacion
                    </div>
                    <form id="planing" method="post">
                        <div class="card-body">
                            <div id="alert"></div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Nombre</span>
                                <input type="text" id="p_id" class="form-control" placeholder="Nombre de planificación" name="id" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Fecha de inicio</span>
                                <input type="date" id="pl_inicio" class="form-control" name="f_inicio" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Fecha de fin</span>
                                <input type="date" id="p_address" class="form-control" name="f_fin" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-primary">Añadir materiales</button>
                            </div>
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-primary">Añadir terreno</button>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="tool" aria-label="Default select example" name="tool">
                                    <option selected value="0">Herramienta</option>
                                    <option value="1">One</option>
                                    <option value="2">Twoterreno</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="pt_insumo" aria-label="Default select example" name="insumo">
                                    <option selected value="0">Insumos</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="pt_lote" aria-label="Default select example" name="lote">
                                    <option selected value="0">Lotes</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <select class="form-select" id="pt_workers" aria-label="Default select example" name="workers">
                                    <option selected value="0">Trabajdores</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <input type="submit" class="form-control btn btn-primary" aria-label="Username" aria-describedby="basic-addon1" value="Registrar">
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script src="../static/js/bootstrap.bundle.min.js"></script>
    <script src="../static/jquery/jquery-3.6.0.min.js"></script>
    <script src="../static/js/scripts/main.js" type="module"></script>
</body>

</html>
