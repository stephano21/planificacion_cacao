<?php
session_start();
//error_reporting(0);
include("../php/scripts/conn.php");
if (!isset($_SESSION['user'])) {
    //echo $_SESSION['user'];
    echo '<script> alert("Por favor, inicia sesión"); 
    window.location = "/"</script>';
}
require_once("conn.php");
$sql= mysqli_query($conn,"SELECT * FROM producto ORDER BY tipo_product");
if(!$sql){
    /* $res[]=array(
        "class"=>"danger",
        "message"=>"Ha ocurrido un error intenta mas tarde!"
    );
    return $json=json_encode($res); */
    return 'error';
}
$res=array();
while ($row=mysqli_fetch_array($sql)) {
    $res[]=array(
        'id'=>$row['id_producto'],
        'name'=>$row['nombre_product'],
        'detail'=>$row['descripcion'],
        'unit'=>$row['cantidad_product'],
        'price'=>$row['precio_product'],
        'type'=>$row['tipo_product']
    );
}
echo $json=json_encode($res);