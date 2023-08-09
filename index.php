<?php session_start(); 
ob_start();?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script src="./js/funciones.js" defer></script>
    <link href="./css/output.css" rel="stylesheet">
    <title>Login</title>
    <style>
        body {
            background: rgb(8, 0, 139);
            background: linear-gradient(0deg, rgba(8, 0, 139, 1) 0%, rgba(0, 212, 255, 1) 100%);
        }
    </style>
</head>

<body>
    <!-- Contenedor principal -->
    <div class="min-h-screen flex flex-wrap justify-center sm:content-center font-['Open_Sans']">
        <!-- Contenedor del formulario de inicio de sesión -->
        <div class="w-full overflow-hidden sx:max-w-ssx  sm:border border-gray-BD bg-[#fff5d2] rounded-3xl text-gray-33">

            <div class="overflow-hidden">
                <img class="scale-150" src="./pictures/logo.jpg" alt="logo">
            </div>

            <h3 class="font-semibold text-xl leading-snug text-center mb-4 px-12">Bienvenido</h3>

            <!-- Formulario de inicio de sesión -->
            <form action="./controller/CUD_login.php" method="post" class=" flex flex-col gap-4 px-12 pb-8 relative text-gray-500">

                <!-- Campo para el correo electrónico -->
                <label class="flex items-center bg-white gap-3 border-2 border-gray-BD rounded-lg p-3 ps-4 focus-within:border-blue-300">
                    <div class="w-4"><img src="./svg/email.svg" alt="logo"></div>
                    <input class="outline-none w-full " type="email" name="email" autocomplete="off" placeholder="Email" value="<?php echo isset($_SESSION['login_email']) ? ($_SESSION['login_email']) : '';
                                                                                                                                unset($_SESSION['login_email']); ?>" required>
                </label>
                <!-- Campo para la contraseña -->
                <label class="flex items-center bg-white gap-3 border-2 border-gray-BD rounded-lg p-3 ps-4 focus-within:border-blue-300">
                    <div class="w-4"><img src="./svg/password.svg" alt="logo"></div>
                    <input class="outline-none w-full" type="password" name="password" autocomplete="off" placeholder="Password" required>
                </label>

                <!-- Mostrar mensaje de error si está configurado -->
                <?php
                if (isset($_SESSION['error_message'])) {
                    echo '<p id="msj" class="text-red-500 w-3/4 text-center absolute transform duration-500 ease-in-out mb-16 bottom-8" >' . $_SESSION['error_message'] . '</p>';
                    unset($_SESSION['error_message']);
                }
                ?>

                <!-- Botón para enviar el formulario -->
                <button class="w-full p-2 mt-2 bg-blue-500 rounded-lg text-sm leading-normal font-semibold text-white hover:bg-blue-700" type="submit">Ingresar</button>
            </form>


        </div>
    </div>
</body>

</html>
<?php ob_end_flush(); ?>