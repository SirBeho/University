<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require("./conection.php");
    extract($_POST);


    $query = "UPDATE materia SET ma_nombre='$nombre', ma_profesor='$profesor' WHERE ma_id='$id'";

    if ($mysqli->query($query) === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

      
         $_SESSION['error_message'] = $mysqli->error;
        
    }

    header("Location: ../view/clases.php");
    exit; 
};
