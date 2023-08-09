<?php
require_once("../controller/connection.php");

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


    $resultado = $mysqli->query("SELECT * from usuario where us_permiso = '3'");

    if ($resultado) {
        if ($resultado->num_rows > 0) {
            while ($datos = $resultado->fetch_assoc()) {
?>
  <tr>
                        <td><?php echo $datos['us_id']; ?></td>
                        <td><?php echo $datos['us_dni']; ?></td>
                        <td><?php echo $datos['us_name']; ?></td>
                        <td><?php echo $datos['us_email']; ?></td>
                        <td><?php echo $datos['us_addres']; ?></td>
                        <td><?php echo $datos['us_birth']; ?></td>
                        <td>
                             <div class="flex gap-2 w-12 justify-center overflow-hidden bg-transparent">
                                <div>
                                    <img class="cursor-pointer" src="../svg/edit.svg" alt="">
                                </div>
                                <!-- <div>
                                    <img src="../svg/trash.svg" class="cursor-pointer" alt="">
                                </div> -->
                            </div>
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