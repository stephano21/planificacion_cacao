<?php
session_start();
//error_reporting(0);
include("conn.php");
if (!isset($_SESSION['user'])) {
    echo '<script> alert("Por favor, inicia sesión"); 
    window.location = "/"</script>';
}
session_destroy();
echo '<script>window.location = "/"</script>';