<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/output.css" rel="stylesheet">
    <!-- Agregamos el enlace a la biblioteca jQuery requerida por Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    
        <!-- Modal de confirmación -->
        <div class="fixed top-0 left-0 w-full h-full flex items-center justify-center " id="confirmDeleteModal">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Registro</p>
                        <div class="modal-close cursor-pointer z-50" onclick="hideConfirmModal()">
                            X
                        </div>
                    </div>
                    <p>Registro agregado correctamente</p>
                    <div class="flex justify-end pt-2">
                          <form id="deleteForm" method="post" action="index.php">
                            <button type="submit" class="px-4 bg-red-600 p-3 rounded-lg text-white hover:bg-red-800">Aceptar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>