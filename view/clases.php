<?php include '../template/header.php' ?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_clase').DataTable();
        });
    </script>



    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Lista de Clases</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Clases</span></span>
    </div>

    <div class="w-full bg-white rounded-md">
        <div class="flex justify-between items-center border-b p-2">
            <span class="block ">Informacion de Clase</span>
            <!-- <button data-modal-target="clase-modal" data-modal-toggle="clase-modal" type="submit" class="w-fit    text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Agregar clase</button> -->
        </div>





        <div class="p-4">
            <table id="table_clase" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Clases</th>
                
                        <th>Maestro</th>

                        <th>Alumnos Inscritos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php include "../model/clases.php" ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Clases</th>
                
                        <th>Maestro</th>

                        <th>Alumnos Inscritos</th>
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

<?php include  '../layout/modalClase.php' ?>
<?php include '../template/footer.php' ?>