<?php
session_start();
ob_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: ../index.php");
    die();
}
extract($_SESSION['usuario']);

include ("../functions/etiquetas.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="../css/input.css" rel="stylesheet"> -->
    <link href="../css/output.css" rel="stylesheet">
    <script src="../js/menu.js" defer></script>
    <script src="../js/funciones.js" defer></script>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <link href="../DataTables/datatables.min.css" rel="stylesheet">
    <script src="../DataTables/datatables.min.js"></script>
</head>
<body>
    <div class="flex h-screen w-screen">
        <?php include_once '../template/Slidebar.php'?>
        <div class="flex flex-col w-full h-full ">
            <nav class="flex justify-between px-4 min-h-[3rem] bg-white relative">

                <div class=" flex gap-5 items-center ">
                    <img id="toggle" class="cursor-pointer" src="../svg/bars.svg" alt="" srcset="">
                    <a href="./dashboard.php" class="flex">
                        <h1 class=" mr-2">HOME </h1>

                        <img src="../svg/home.svg" alt="" srcset="">

                    </a>
                </div>

                <div id="control-menu" class="flex items-center gap-2 cursor-pointer">

                    <span class="hidden sx:block font-semibold text-xs leading-snug"><?php echo $us_name . " " . $us_lastname ?></span>
                    <div class="hidden sx:block w-4 transform transition-transform duration-500 ">
                        <img src="../svg/arrow.svg" alt="logo" />
                    </div>
                </div>

                <div id="menu" class="z-10 border border-gray-BD rounded-xl p-2 w-36 bg-white text-xs absolute top-12 right-[1%] overflow-hidden h-0 opacity-0 transform duration-500 ease-in-out">
                    <div class="border-b">
                        <a href="./profile.php" class="flex items-center gap-2 p-2 mb-2 hover:bg-gray-100 rounded-xl cursor-pointer">
                            <div class="w-6">
                                <img src="../svg/profile.svg" alt="">
                            </div>
                            <span>My Profile</span>
                        </a>
                    </div>

                    
                    <a href="../controller/logout.php" class="flex items-center gap-2 mt-2 p-2 hover:bg-gray-100 rounded-xl text-red-500 cursor-pointer">
                        <div class="w-6">
                            <img src="../svg/logout.svg" alt="">
                        </div>
                        <span>Logout</span>
                    </a>
                </div>
            </nav>