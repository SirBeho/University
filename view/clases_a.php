<?php include '../model/header.php' ?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_clase').DataTable();
        });
    </script>


        <!-- titulo -->
    <div class=" flex justify-between my-4">
        <h1 class="text-2xl">Esquema de Clases</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Clases</span></span>
    </div>



    <div class="flex gap-4">
<!-- izquierd -->
        <div class=" flex flex-col w-full bg-white rounded-md shadow-md">
            <span class="flex border-b p-2">
                Tus Materias Inscritas
            </span>
            <div class="flex w-full gap-4 p-4">
                <table id="table_clase" class="display table table-bordered w-screen " >
                    <thead >
                        <tr >
                            <th class="w-auto ">#</th>
                            <th class="w-80">Materia</th>
                            
                            <th class="w-80">Darse de baja</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>System Architect</td>
                            <td>
                                <img data-modal-target="retiro-modal" data-modal-toggle="retiro-modal" class="cursor-pointer" src="../svg/retirar.svg" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>System Architect</td>
                            <td>
                                <img data-modal-target="retiro-modal" data-modal-toggle="retiro-modal" class="cursor-pointer" src="../svg/retirar.svg" alt="">
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
        </div>
        
<!-- derecha -->
        <div class="flex flex-col w-1/2  bg-white rounded-md shadow-md">
            <span class="flex border-b p-2">
                Materias para inscribir
            </span>

            <div class="flex flex-col gap-2 m-4">
            <span class="font-bold ">Selecciona las Clases usa la tecla Ctrl</span>

            <form action="./prueva.php" id="inscribirForm" method="post" class="flex flex-col p-4 border rounded-md">

                <label>
                    <input type="checkbox" name="item[]" value="1" class="sr-only peer ">
                    <span class="block ps-2 peer peer-checked:bg-blue-200">Matematica</span>
                </label>
                <label>
                    <input type="checkbox" name="item[]" value="2" class="sr-only peer">
                    <span class="block ps-2 peer  peer-checked:bg-blue-200">Matematica</span>
                </label>
                <label>
                    <input type="checkbox" name="item[]" value="3" class="sr-only peer">
                    <span class="block ps-2 peer  peer-checked:bg-blue-200">Matematica</span>
                </label>



                
            </form>
            <button type="submit" class="self-end  bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Enviar
            </button>
            </div>
        </div>



    </div>


    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>

    <script>




    </script>




</main>

<?php include  '../model/modalRetirar.php' ?>
<?php include '../model/footer.php' ?>