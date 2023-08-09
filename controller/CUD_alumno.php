<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);

    require("./connection.php");
    if ($accion == "create") {

        try {
            $hash = password_hash("university-" . substr($name, 0, 3), PASSWORD_DEFAULT);
            
            $query = "INSERT INTO usuario (us_dni,us_name, us_lastname, us_addres, us_birth, us_email, us_password,us_permiso,us_status) VALUES ('$dni','$name', '$lastname', '$addres', '$birth', '$email', '$hash',3,1)";
        
            if ($mysqli->query($query) === true) {
                $_SESSION['success_message'] = "Alumno creado correctamente, <b> Contraseña: university-" . substr($name, 0, 3)."</b>";
            } 
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al crear el usuario: " . $e->getMessage();
        }
        
    }elseif ($accion == "update") {
        
        $query = "UPDATE usuario SET us_dni='$dni',us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$birth' WHERE us_id='$id'";

        if ($mysqli->query($query) === true) {
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    } elseif ($accion == "delete") {
       
        $query = "DELETE FROM usuario WHERE us_id='$id'";   
        if ($mysqli->query($query) === true) {
            $_SESSION['success_message'] = "Alumno eliminado correctamente";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    }

     header("Location: ../view/alumnos.php");
     exit;
};
