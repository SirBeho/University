<?php include '../template/header.php' ?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_alumno').DataTable();
        });
    </script>



    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Alumnos de la clase de Matematica</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Matematica</span></span>
    </div>

    <div class="w-full bg-white rounded-md">
        <div class="flex justify-between items-center border-b p-2">
            <span class="block ">Lista de Alumnos</span>
         </div>





        <div class="p-4">
            <table id="table_alumno" class="display table table-bordered  " style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre de Alumno</th>
                
                        <th>Calificacion</th>

                        <th>Mensaje</th>
                        <th>Fec. De Nacimiento</th> <!-- //no va -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td><?php echo EtiquetaMensaje("Te fue bien") ?></td>
                        <td>
                               
                         <img data-modal-target="calificacion-modal" data-modal-toggle="calificacion-modal" class="cursor-pointer" src="../svg/edit.svg" alt="">
                            
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td><?php echo EtiquetaMensaje("") ?></td>
                        <td>
                               
                         <img data-modal-target="calificacion-modal" data-modal-toggle="calificacion-modal" class="cursor-pointer" src="../svg/edit.svg" alt="">
                            
                        </td>
                    </tr>
                   
                   
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Oficina</th>
                        <th>Edad</th>
                        <th>Fecha de inicio</th>
                        <th>Salario</th>
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

<?php include  '../layout/modalCalificacion.php' ?>
<?php include '../template/footer.php' ?>