<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
    extract($_POST);

    require("./connection.php");
    $id_alum = $_SESSION['usuario']['us_id'];

    foreach ($item as $id_materia) {
    
        $resultado = $mysqli -> query("INSERT INTO seleccion (`se_alumno`, `se_materia`) VALUES ('$id_alum ','$id_materia')"); 
    
       
    } 
  
     
    if ( $resultado === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

      
         $_SESSION['error_message'] = $mysqli->error;
        
    }

   header("Location: ../view/clases_a.php");
    exit;
     
};




