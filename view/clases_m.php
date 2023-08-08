<?php include '../model/header.php' ?>
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

    
        
        <div class="flex flex-wrap gap-4 mt-4 w-full"> <!-- //while -->


            <div class=" flex flex-col items-center w-60 bg-white rounded-md p-4 shadow-xl ">
                <div class="w-full rounded-md overflow-hidden  bg-blue-200">
                    <img class="w-full h-full" src="../svg/school.svg" alt="">
                </div>
                <span class="font-bold "> Matematicas</span>
                <span class="">Alumnos: 25</span>
                <a href="./alumnos_m.php"><img class="bg-blue-200 rounded-md p-1 w-16 h-6 " src="../svg/eyes.svg" alt=""></a>
            
            </div>
            <div class=" flex flex-col items-center w-60 bg-white rounded-md p-4 shadow-xl ">
                <div class="w-full rounded-md overflow-hidden  bg-blue-200">
                    <img class="w-full h-full" src="../svg/school.svg" alt="">
                </div>
                <span class="font-bold "> Matematicas</span>
                <span class="">Alumnos: 25</span>
                <img class="bg-blue-200 rounded-md p-1 w-16 h-6" src="../svg/eyes.svg" alt="">

            </div>
            <div class=" flex flex-col items-center w-60 bg-white rounded-md p-4 shadow-xl ">
                <div class="w-full rounded-md overflow-hidden  bg-blue-200">
                    <img class="w-full h-full" src="../svg/school.svg" alt="">
                </div>
                <span class="font-bold "> Matematicas</span>
                <span class="">Alumnos: 25</span>
                <img class="bg-blue-200 rounded-md p-1 w-16 h-6" src="../svg/eyes.svg" alt="">

            </div>




      





    </div>

    <?php
    if (isset($_SESSION['error_message'])) {
        echo '<p id="msj" class="text-red-500 w-full text-center absolute transform duration-500 ease-in-out mb-8 bottom-8">' . $_SESSION['error_message'] . '</p>';
        unset($_SESSION['error_message']);
    }
    ?>
</main>

<?php include  '../model/modalClase.php' ?>
<?php include '../model/footer.php' ?>