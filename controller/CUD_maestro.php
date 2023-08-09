<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);

    require("./connection.php");
    if ($accion == "update") {
        
      
        $tiposSeleccionados = isset($_POST["item"]) ? implode(', ', $_POST["item"]) : array();
        if ($tiposSeleccionados) {

            $mysqli->query("UPDATE `materia` SET `ma_profesor`= null WHERE ma_profesor = $id and ma_id not in ($tiposSeleccionados)");
        };

        $query = "UPDATE usuario SET us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$born' WHERE us_id='$id'";

        if ($mysqli->query($query) === true) {
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    } elseif ($accion == "create") {

        try {
            $hash = password_hash("universidad" . substr($name, 0, 3), PASSWORD_DEFAULT);
            $hash ="universidad" . substr($name, 0, 3);
            $query = "INSERT INTO usuario (us_name, us_lastname, us_addres, us_birth, us_email, us_password,us_permiso,us_status) VALUES ('$name', '$lastname', '$addres', '$born', '$email', '$hash',2,1)";
        
            if ($mysqli->query($query) === true) {
                $_SESSION['success_message'] = "Usuario creado correctamente, <b> Contraseña: universidad" . substr($name, 0, 3)."</b>";
            } 
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al crear el usuario: " . $e->getMessage();
        }
        
    }elseif ($accion == "delete") {
       

        if ($mysqli->query($query) === true) {
            $_SESSION['success_message'] = "Usuario eliminado correctamente";
        } else {
            $_SESSION['error_message'] = $mysqli->error;
        }
    }

     header("Location: ../view/maestros.php");
     exit;
};
