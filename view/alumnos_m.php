<?php include '../template/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
if (!isset($_SESSION['materias_ids']) || !in_array($_GET['id_m'], $_SESSION['materias_ids'])) {
    header("Location: ./clases_m.php");
    die();
}
$id_mat = $_GET['id_m'];
$_SESSION['id_mat'] = $_GET['id_m'];
$resultado = $mysqli->query("SELECT * FROM materia where ma_id = $id_mat");
$datos = $resultado->fetch_assoc();

?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_alumno').DataTable();
        });
    </script>

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Alumnos de la clase de <?php echo $datos['ma_nombre']; ?></h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600"><?php echo $datos['ma_nombre']; ?></span></span>
    </div>

    <div class="w-full bg-white rounded-md">
        <div class="relative flex justify-between items-center border-b p-2">
            <span class="block ">Lista de Alumnos</span>
            <?php
            if (isset($_SESSION['error_message'])) {
                echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out bottom-8">' . $_SESSION['error_message'] . '</p>';
                unset($_SESSION['error_message']);
            }
            if (isset($_SESSION['success_message'])) {
                echo '<span id="msj" class="text-green-500 w-full text-center absolute transform duration-500 ease-in-out left-0 bottom-8">' . $_SESSION['success_message'] . '</span>';
                unset($_SESSION['success_message']);
            }
            ?>
        
        
        </div>


        <div class="p-4">
            <table id="table_alumno" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Alumno</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php include "../model/clases_calificacion.php" ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Alumno</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
</main>

<?php include  '../layout/modalCalificacion.php' ?>
<?php include '../template/footer.php' ?>