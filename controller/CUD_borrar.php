<?php
require("connection.php");

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id = $id";
    $resultado = $mysqli->query($query);

    if ($resultado) {
        header("Location: ../view/index.php");
        exit();
    } else {
        echo "Error al eliminar el registro: " . $mysqli->error;
    }
}

$mysqli->close();
?>
