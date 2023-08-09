<?php include '../template/header.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_calificacion').DataTable();
        });
    </script>

    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Calificaciones de mensajes de tus clases</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Mis calificaciones</span></span>
    </div>

    <div class="w-full bg-white rounded-md">
        <div class="relative flex justify-between items-center border-b p-2">
            <span class="block ">Calificaciones de mensajes de tus clases</span>
        </div>


        <div class="p-4">
            <table id="table_calificacion" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de clase</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>
                       
                    </tr>
                </thead>
                <tbody>
                <?php include "../model/R_alumno_calificacion.php" ?>
                
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nombre de clase</th>
                        <th>Calificacion</th>
                        <th>Mensaje</th>    
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    
</main>

<?php include  '../layout/modalCalificacion.php' ?>
<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>