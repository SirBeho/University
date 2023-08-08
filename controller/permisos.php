<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);

    require("./conection.php");

    $status = isset($_POST["status"]);


    $query = "UPDATE usuario SET us_email='$email',us_permiso='$permiso',us_status='$status' WHERE us_id='$id'";

    if (($id != $_SESSION['usuario']['us_id']) and $mysqli->query($query) === true) {

        $_SESSION['success_message'] = "Datos actualizados correctamente";
    } else {

        if ($id == $_SESSION['usuario']['us_id']) {
            $_SESSION['error_message'] = "No puedes actualizar tus propios permisos";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    }

    header("Location: ../view/permisos.php");
    exit;
};
