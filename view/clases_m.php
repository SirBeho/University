<?php include '../template/header.php'

?>
<main class="h-full w-full flex flex-col bg-gray-100 px-4">

    <script>
        $(document).ready(function() {
            $('#table_clase').DataTable();
        });
    </script>



    <div class="relative flex justify-between my-4">
        <h1 class="text-2xl">Lista de Clases</h1>
        <span class="text-sm text-blue-900">Inicio / <span class="text-gray-600">Clases</span></span>
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

    
        
    <div class="flex flex-wrap gap-4 mt-4 w-full"> <!-- //while -->


    <?php include "../model/clases_profesor.php" ?>


    </div>

   
</main>

<?php include  '../layout/modalClase.php' ?>
<?php include '../template/footer.php' ?>