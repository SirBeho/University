<?php 
include '../template/header.php';


var_dump($_SESSION['usuario']);

?>

<main class="h-full flex flex-col  bg-gray-100 px-3"> 
    
    <div class="w-full flex justify-between my-4">
        <h1 class="text-2xl">Dashboard</h1>
        <span class="text-sm text-blue-900">Home / <span class=" text-gray-600">Dashboard</span></span>
    </div>

    <div class="w-fit bg-white p-2 rounded-md pe-4">
        Bienvenido</br> Selecciona la accion que quieras realizar e las pestañas del menu de la izquierda
    </div>

    
    

</main>


<?php include '../template/footer.php' ?>