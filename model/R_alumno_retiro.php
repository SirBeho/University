<?php
require_once("../controller/connection.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $resultado = $mysqli->query("select * from vista_materia_calificacion where se_id=$id");

    $result = $resultado->fetch_assoc();
    if (empty($result)) {
        $respuesta = array('status' => false, 'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
} else {
    $id_alum = $_SESSION['usuario']['us_id'];
    $resultado = $mysqli->query("SELECT * FROM vista_materia_calificacion where se_alumno = $id_alum ");

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
                $id = $datos['se_id'];
                $nombre = $datos['ma_nombre'];
                $eliminar = array(
                    'controller' => "CUD_clase.php",
                    'accion' => "delete",
                    'query' => "DELETE FROM seleccion WHERE se_id = $id",
                    'msj' =>  "Retirar $nombre"
                );  
    ?>
        <tr>
            <td><?php echo $datos['se_id']; ?></td>
            <td><?php echo $datos['ma_nombre']; ?></td>
            <td>
                <img onclick='Eliminar(<?php echo json_encode($eliminar); ?> )' data-modal-target="delete-modal" data-modal-toggle="delete-modal" class="cursor-pointer" src="../svg/retirar.svg" alt="">
            </td>
        </tr>
    <?php
            }
        }
    } else {
        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
    }
}

?>