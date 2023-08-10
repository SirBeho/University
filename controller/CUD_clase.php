<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require("./connection.php");
    extract($_POST);
    if ($accion == "create") {
        try {
            $query = "INSERT INTO materia (ma_nombre, ma_profesor) VALUES ('$name','$profesor')";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Registro creado correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al crear el registro: " . $e->getMessage();
        }
    } elseif ($accion == "update") {
        try {
            $query = "UPDATE materia SET ma_nombre='$nombre', ma_profesor='$profesor' WHERE ma_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Datos actualizados correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al actualizar los datos: " . $e->getMessage();
        }
    } elseif ($accion == "delete") {
        try {
            $query = "DELETE FROM materia WHERE ma_id='$id'";
            $mysqli->query($query);
            $_SESSION['success_message'] = "Materia eliminada correctamente";
        } catch (Exception $e) {
            $_SESSION['error_message'] = "Error al eliminar el materia: " . $e->getMessage();
        }
    }

    header("Location: ../view/clases.php");
    exit;
}
?>
