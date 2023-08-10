<?php 
include '../template/header.php';


?>

<main class="bg-gray-900 text-white">

    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-4">Tablas con Alternancia de Modo</h1>
        <button id="toggleMode" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded">
            Alternar Modo
        </button>
    </div>

    <div class="container mx-auto p-8">
        <h2 class="text-xl font-semibold mb-4">Tabla en Modo Claro</h2>
        <table id="tablaLight" class="table table-light mt-4">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Jane Smith</td>
                    <td>28</td>
                </tr>
                <!-- Agrega más filas aquí si es necesario -->
            </tbody>
        </table>
    </div>

   

    <script>
        $(document).ready(function() {
            var darkMode = false;

            $('#toggleMode').click(function() {
                console.log("cambia")
                darkMode = !darkMode;
                if (darkMode) {
                    $('#tablaLight').removeClass('table-light');
                    $('#tablaLight').addClass('table-dark');
                    $('#tablaDark').removeClass('table-light');
                    $('#tablaDark').addClass('table-dark');
                } else {
                    $('#tablaLight').removeClass('table-dark');
                    $('#tablaLight').addClass('table-light');
                    $('#tablaDark').removeClass('table-dark');
                    $('#tablaDark').addClass('table-light');
                }
            });

            $('#tablaLight').DataTable();
            $('#tablaDark').DataTable();
        });
    </script>

    </main>



<?php include  '../layout/modalDelete.php' ?>
<?php include '../template/footer.php' ?>