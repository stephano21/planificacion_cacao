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
function planificacion($name,$inicio,$fin,$l_material,$l_terreno,$l_trabajador,$type){
    require_once("conn.php");
    $res=[];
    $sql=mysqli_query($conn,"INSERT INTO planificacion (nombre_p,tipo_p,fecha_inicio,fecha_fin)VALUES ('$name','$type','$inicio','$fin')");
    $id = mysqli_query($conn,"SELECT last_insert_id()");
    $id_plan = mysqli_fetch_array($id);
    $id_planing = $id_plan[0];
    $i = 0;

    for (; ; ) {
        if ($i >= sizeof($l_material)) {
            break;
        }
        $id_material=$l_material[$i][0];
        if($material=mysqli_query($conn,"INSERT INTO  proPlan (id_plan ,id_producto ) VALUES ('$id_planing','$id_material')")){
            $i++;
        }else{
            break;
        }
        
    }
    $j = 0;
    for (; ; ) {
        if ($j >= sizeof($l_terreno)) {
            break;
        }
        $id_terreno=$l_terreno[$j][0];
        if($terreno=mysqli_query($conn,"INSERT INTO  terrPlan (id_plan ,id_terreno ) VALUES ('$id_planing','$id_terreno')")){
           if ( $status=mysqli_query($conn,"UPDATE terreno SET estado='1' WHERE id_terreno='$id_terreno'")) {
                $j++;
           }
        }else{
            break;
        }
        
    }
    $k = 0;
    for (; ; ) {
        if ($k >= sizeof($l_trabajador)) {
            break;
        }
        $id_trabajador=$l_trabajador[$k][0];
        if($trabajador=mysqli_query($conn,"INSERT INTO  userPlan (id_plan ,id_user ) VALUES ('$id_planing','$id_trabajador')")){
            $k++;
        }else{
            break;
        }
        
    }    
    $res=array(
        "class"=>"success",
        "message"=>"$name Registrado exitosamente!"
    );
    
    return $json=json_encode($res);
}

?>