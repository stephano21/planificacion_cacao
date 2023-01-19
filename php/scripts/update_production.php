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
$res=[];
$id=$_POST['id'];
$cantidad=$_POST['cantidad'];
$sql= mysqli_query($conn,"UPDATE terrPlan SET `lb`='$cantidad' WHERE id_terrPlan='$id'");
if(!$sql){
    $res[]=array(
        "class"=>"danger",
        "message"=>"Ha ocurrido un error intenta mas tarde!"
    );
    echo $json=json_encode($res);
}else{
    $res[]=array(
        'class'=>"succes",
        'message'=>"Actualizado exitosamente!"
    );
    echo $json=json_encode($res);
}

