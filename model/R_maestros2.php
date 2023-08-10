<?php
require_once("./controller/connection.php");

if (!empty($_GET['id'])) {
    $id = $_GET['id'];

    $resultado = $mysqli->query("select * from usuario where us_id=$id");

    $result = $resultado->fetch_assoc();
    if (empty($result)) {
        $respuesta = array('status' => false, 'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true, 'data' => $result);
    }
    echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
} else {


    $resultado = $mysqli->query("SELECT * from vista_profesor_materia");
    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
                $img = is_file("../pictures/user_{$datos['us_id']}");
                $eliminar = array(
                    'controller' => "CUD_maestro.php",
                    'id' => $datos['us_id'],
                    'msj' =>  "Eliminar a " . $datos['us_name']
                );
                ?>
                <tr>
                    <td><?php echo $datos['us_id']; ?></td>
                    <td><?php echo $datos['us_name']; ?></td>
                    <td><?php echo $datos['us_email']; ?></td>
                    <td><?php echo $datos['us_addres']; ?></td>
                    <td><?php echo $datos['us_birth']; ?></td>
                    
                </tr>



<?php
            }
        }
    } else {
        echo "<tr><td colspan='5'>Error executing the query: " . $mysqli->error . "</td></tr>";
    }
}

?>