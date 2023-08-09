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
    ?>
        <tr>
            <td><?php echo $datos['se_id']; ?></td>
            <td><?php echo $datos['ma_nombre']; ?></td>
            <td>
                <img onclick="RetirarMateria(<?php echo $datos['se_id']; ?>)" data-modal-target="retiro-modal" data-modal-toggle="retiro-modal" class="cursor-pointer" src="../svg/retirar.svg" alt="">
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