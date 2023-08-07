<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    extract($_POST);

    require("./conection.php");

    var_dump($_POST);
  
    $resultado = $mysqli -> query("INSERT INTO `users`( `name`, `email`, `adress`, `phone`) VALUES ('$name','$email','$addres','$telefono')"); 
    
    $_SESSION['correcto'] = "hola";
   header("Location: ../view/verificacion.php");
    exit;
     
};




