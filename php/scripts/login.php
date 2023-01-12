<?php
session_start();
require_once("conn.php");
if (isset($_POST['user']) && !empty($_POST['user'])){
    $usuario = $_POST['user'];
        $password = $_POST['password'];
        $sql = mysqli_query($conn,"SELECT*FROM usuario WHERE cedula='$usuario'");
        if (mysqli_num_rows($sql)==1){
            $rows = mysqli_fetch_array($sql);
            if (password_verify($password,$rows['password'])){
                $_SESSION['user']=$usuario;
                echo TRUE;
            }else{
                echo "Usuario o conraseña incorrectos!";
            }
        }else{
            echo"Usuario no encontrado";
        }
}