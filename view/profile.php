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
        </div>

        <form action="../controller/maestro_register.php" id="maestroForm" method="post" class="space-y-6 relative p-4" action="#">


            <label class="block text-sm font-medium text-gray-900 dark:text-white">Correo Electronico
                <input type="email" name="email" autocomplete="off" placeholder="Ingrese el email" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white"> Password
                <div class="relative flex items-center  w-full">
                    <input disabled placeholder="Enter your password..." name="password" class="w-full text-sm border border-gray-400 rounded-xl bg-transparent p-3 pr-10" value="*********">
                    <img data-modal-target="password-modal" data-modal-toggle="password-modal" id="edit_password" class="absolute right-4 w-5 h-5 cursor-pointer" src="../svg/lapiz.svg" alt="">
                </div>
            </label>

            <label class="block text-sm font-medium text-gray-900 dark:text-white">Nombre
                <input type="text" name="nombre" autocomplete="off" placeholder="Ingrese el nombre" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Apellido
                <input type="text" name="apellido" autocomplete="off" placeholder="Ingrese el apellido" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Direccion
                <input type="text" name="addres" autocomplete="off" placeholder="Ingrese la direccion" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>
            <label class="block text-sm font-medium text-gray-900 dark:text-white">Fecha de Nacimiento
                <input type="date" name="born" autocomplete="off" placeholder="dd/mm/yyyy" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg mt-2 focus:ring-blue-500  focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
            </label>

            <div id="btn_modal" class="flex justify-between gap-2 mt-2">
                <button type="submit" class="w-fit   text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar cambios</button>
                <button type="button" data-modal-hide="alumno-modal" class="w-fit text-white bg-gray-600 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
            </div>
        </form>



    </div>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>
</main>

<?php include  '../layout/modalPassword.php' ?>

<?php include '../template/footer.php' ?>