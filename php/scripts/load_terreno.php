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
$sql= mysqli_query($conn,"SELECT * FROM terreno ORDER BY nombre_terreno");
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
        'id'=>$row['id_terreno'],
        'name'=>$row['nombre_terreno'],
        'unit'=>$row['n_plantas'],
        'type'=>$row['tipo_cultivo'],
        'status'=>$row['estado'],
        'dim'=>$row['dimencion']
    );
}
echo $json=json_encode($res);