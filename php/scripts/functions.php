<?php
/* set de fuciones para registros y consultas a la bae de datos */
function create_material($name,$detail,$price,$quantity,$usuario,$date,$type) {
    require_once("conn.php");
    $res=[];
    $sql= mysqli_query($conn,"INSERT INTO producto (nombre_product ,  descripcion,  cantidad_product,  precio_product,  tipo_product,  fecha_product ,  usuario_id )VALUES('$name','$detail','$quantity','$price','$type','$date','$usuario')");
    if(!$sql){
        $res=array(
            "class"=>"danger",
            "message"=>"Ha ocurrido un error intenta mas tarde!"
        );
        return $json=json_encode($res);
    }
    $res=array(
        "class"=>"success",
        "message"=>"Registrado exitosamente!"
    );
    
    return $json=json_encode($res);
}
//AGREGO EL CAMPO TIPO TABLAS Y ASI MISMO EN LA INSERCIÓN
function create_lote($name,$plantas,$t_cultivo,$dim){
    require_once("conn.php");
    $res=[];
    $sql= mysqli_query($conn,"INSERT INTO terreno (nombre_terreno,n_plantas,tipo_cultivo,dimencion)VALUES('$name','$plantas','$t_cultivo','$dim')");
    if(!$sql){
        $res=array(
            "class"=>"danger",
            "message"=>"Ha ocurrido un error intenta mas tarde!"
        );
        return $json=json_encode($res);
    }
    $res=array(
        "class"=>"success",
        "message"=>"$name Registrado exitosamente!"
    );
    
    return $json=json_encode($res);
}

?>