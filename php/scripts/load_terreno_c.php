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
$id=$_GET['id'];
$sql= mysqli_query($conn,"SELECT tp.id_terrPlan,t.id_terreno,t.nombre_terreno FROM planificacion as p, terreno as t, terrPlan as tp WHERE (t.id_terreno=tp.id_terreno AND p.id_planificacion=tp.id_plan)AND p.id_planificacion='$id'");
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
        'id_table'=>$row['id_terrPlan']
    );
}
echo $json=json_encode($res);