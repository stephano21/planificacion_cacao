<?php
if(isset($_POST['id']) && isset($_POST['password'])){
    require_once("conn.php");
    $res=[];
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_h=password_hash($password,PASSWORD_DEFAULT);

    $validate=mysqli_query($conn,"SELECT * FROM usuario WHERE cedula='$id'");
    if(mysqli_num_rows($validate)==0){
        if(  $sql=mysqli_query($conn,"INSERT INTO usuario (cedula,Nombre_completo,correo,password)VALUES('$id','$fullname','$email','$password_h')")){
            $res=array(
                "class"=>"success",
                "message"=>"Usuario registrado exitosamente!"
            );
            $json=json_encode($res);
            echo $json;
        }else{
            $res=array(
                "class"=>"danger",
                "message"=>"No se pudo registrar, intente mas tarde!"
            );
            $json=json_encode($res);
            echo $json;
        }
    }else{
        $res=array(
            "class"=>"danger",
            "message"=>"Usuario ya registrado"
        );
        $json=json_encode($res);
        echo $json;
    }
    
}else{
    echo"<script>window.location='/'</script>";
}
