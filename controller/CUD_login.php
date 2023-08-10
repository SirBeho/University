<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);

    require_once("./connection.php");

    $resultado = $mysqli->query("select * from usuario where us_email = '$email'");
    $resultado = $resultado->fetch_assoc();


   if ($resultado && (password_verify($password, $resultado['us_password'])) || $resultado['us_password']== "hashedpassword"  ) {
      // if($resultado && $password == $resultado['us_password']){
        if ($resultado['us_status']) {
            $_SESSION['usuario'] = $resultado;
            if($resultado['us_password']=="hashedpassword"){
                $_SESSION['error_message'] = "Debe Cambiar su Contraseña";
                header("Location: ../view/profile.php");
            }else{
                header("Location: ../view/dashboard.php");
            }
        } else {
            $_SESSION['login_email'] = $email;
            $_SESSION['error_message'] = "Usuario Inactivo";
            header("Location: ../index.php");
        }
    } else {


        $_SESSION['login_email'] = $email;
        $_SESSION['error_message'] = "Usuario o contraseña incorecta";
        header("Location: ../index.php");
        
    }
    exit;
}

