<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);
    require("./conection.php");
  
    $tiposSeleccionados = isset($_POST["item"]) ? implode(', ',$_POST["item"]) : array();
    if($tiposSeleccionados){

        $mysqli->query("UPDATE `materia` SET `ma_profesor`= null WHERE ma_profesor = $id and ma_id not in ($tiposSeleccionados)");
    };

    $query = "UPDATE usuario SET us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$born' WHERE us_id='$id'";

    if ($mysqli->query($query) === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

      
         $_SESSION['error_message'] = $mysqli->error;
        
    }

    header("Location: ../view/maestros.php");
    exit;
};
