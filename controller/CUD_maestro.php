<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    extract($_POST);
    var_dump($_POST);

    require("./connection.php");
    if ($accion == "create") {
        try {
            $hash = password_hash("university-" . substr($name, 0, 3), PASSWORD_DEFAULT);

            $query = "INSERT INTO usuario (us_name, us_lastname, us_addres, us_birth, us_email, us_password, us_permiso, us_status) VALUES ('$name', '$lastname', '$addres', '$born', '$email', '$hash', 2, 1)";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Maestro creado correctamente, <b> Contraseña: university-" . substr($name, 0, 3)."</b>";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al crear el usuario: " . $e->getMessage();
        }
    } elseif ($accion == "update") {
        try {
            $tiposSeleccionados = isset($_POST["item"]) ? implode(', ', $_POST["item"]) : array();
            if ($tiposSeleccionados) {
                $mysqli->query("UPDATE `materia` SET `ma_profesor` = null WHERE ma_profesor = $id AND ma_id NOT IN ($tiposSeleccionados)");
            }

            $query = "UPDATE usuario SET us_email='$email', us_name='$name', us_lastname='$lastname', us_addres='$addres', us_birth='$born' WHERE us_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al actualizar los datos: " . $e->getMessage();
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM usuario WHERE us_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Maestro eliminado correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al eliminar el Maestro: " . $e->getMessage();
        }
    }

    header("Location: ../view/maestros.php");
    exit;
}
?>
