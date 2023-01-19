<?php
session_start();
//error_reporting(0);
include("../php/scrips/conn.php");
if (!isset($_SESSION['user'])) {
    echo '<script> alert("Por favor, inicia sesión"); 
    window.location = "/"</script>';
}
$usuario = $_SESSION['user'];
if(isset($_POST['flag'])){
    include("functions.php");
    $flag= $_POST['flag'];
    if ($flag==1) {
        $name= $_POST['name'];
        $detail= $_POST['detail'];
        $price= $_POST['price'];
        $quantity= $_POST['quantity'];
        $type= $_POST['type'];
        
        date_default_timezone_set('America/Guayaquil');
        $date = date("Y-m-d H:i:s");
        
        echo create_material($name,$detail,$price,$quantity,$usuario,$date,$type);
    
    }else if ($flag==2){
        $name= $_POST['name'];
        $plantas= $_POST['plantas'];
        //agg el tipo de cultivo
        $t_cultivo = $_POST['cultivo'];
        $dim= $_POST['dim'];
        echo create_lote($name,$plantas,$t_cultivo,$dim);
    }elseif($flag==3){
        $name= $_POST['name'];
        $inicio= $_POST['inicio'];
        $fin = $_POST['fin'];
        $type = $_POST['tipo'];
        $l_material = $_POST['material'];
        $l_terreno = $_POST['terreno'];
        $l_trabajador = $_POST['trabajador'];
        echo planificacion($name,$inicio,$fin,$l_material,$l_terreno,$l_trabajador,$type);
    }elseif($flag==4){
        echo 'RSPISE';
    }
}
