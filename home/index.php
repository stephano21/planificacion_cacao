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
    <title>Inicio</title>
</head>

<body style="background-color: #ECEAE7;">
    <?php require_once("../php/partials/nav.php") ?>
    <div class="container">
        <div class="input-group mb-3"></div>
        <div class="input-group mb-3"></div>
        <div class="row">
            <div class="col-sm-4">
                <canvas id="myChart" width="100" height="100"></canvas>
            </div>
            <div class="col-sm-4">
                <canvas id="myChart2" width="100" height="100"></canvas>
            </div>
        </div>

        <script src="../static/js/chart/chart.js"></script>
        <script src="../static/js/bootstrap.bundle.min.js"></script>
        <script src="../static/jquery/jquery-3.6.0.min.js"></script>
        <script src="../static/js/scripts/main.js" type="module"></script>
        <script src="../static/js/scripts/graficos.js"></script>
</body>

</html>
