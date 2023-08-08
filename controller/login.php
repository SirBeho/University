<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    extract($_POST);

    require_once("./conection.php");
    
    $resultado = $mysqli -> query("select * from usuario where us_email = '$email'");
    $resultado = $resultado-> fetch_assoc();
    var_dump( $resultado);
   
    // if($resultado && password_verify($password, $resultado['us_password'])){
    if($resultado && $password == $resultado['us_password']){
        $_SESSION['usuario'] = $resultado;
        header("Location: ../view/dashboard.php");
        exit;
    } else {
        $_SESSION['login_email'] = $email;
        $_SESSION['error_message'] = "Usuario o contraseña incorecta";
        header("Location: ../index.php");
        exit;
    }   
    
};
