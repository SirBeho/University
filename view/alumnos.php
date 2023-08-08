<?php include '../template/header.php' ?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_alumno').DataTable();
        });
    </script>



    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Lista de Alumnos</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Alumno</span></span>
    </div>

    <div class="w-full bg-white rounded-md">
        <div class="flex justify-between items-center border-b p-2">
            <span class="block ">Informacion de Alumnos</span>
            <!-- <button data-modal-target="alumno-modal" data-modal-toggle="alumno-modal" type="submit" class="w-fit    text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar Alumno</button> -->
        </div>





        <div class="p-4">
            <table id="table_alumno" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Fec. De Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php include "../model/alumnos.php" ?>
                   
            </tbody>
                <tfoot>
                    <tr>
                    <th>#</th>
                        <th>DNI</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Direccion</th>
                        <th>Fec. De Nacimiento</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>
</main>

<?php include  '../layout/modalAlumno.php' ?>
<?php include '../template/footer.php' ?>