<?php
include '../connection.php';

if (isset($_POST['aceptar'])) {

    $idUsuario = $_POST['aceptar'];


    $pdocn = Database::connect();
    $query = $pdocn->prepare("UPDATE usuario SET estado = 'activo' WHERE id = ?");
    $query->execute([$idUsuario]);


    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}

if (isset($_POST['rechazar'])) {

    $idUsuario = $_POST['rechazar'];

    $pdocn = Database::connect();
    $query = $pdocn->prepare("UPDATE usuario SET estado = 'inactivo' WHERE id = ?");
    $query->execute([$idUsuario]);

    header("Location: {$_SERVER['PHP_SELF']}");
    exit();
}
?>



<!DOCTYPE html>
<html lang="en">


<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Acciones Gerente de banco</title>
</head>

<body>
    <!-- BARRA DE NAVEGACIÓN -->
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="cliente.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="img/logo1.png" class="h-12" alt="Logo" />
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="gerente_banco.php" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Inicio</a>
                    </li>
                    <li>
                        <a href="crear_sucursal.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Crear Sucursal</a>
                    </li>
                    <li>
                        <a href="movimientos.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Movimientos</a>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
    <!-- CUERPO DE INICIO -->
    <div class="container">
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Aprobar o Rechazar acciones </span>.</h1>
    </div>
    <hr>
    <hr>
    <br>
    <br>

    <div class="container">
        <h2 class="text-4xl font-extrabold dark:text-white">Acciones</h2>
    </div>

    <br>

    <!-- BUSCADOR -->
    <!-- Resto del código HTML -->

    <!-- TABLA -->
    <div class="container">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nombre
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Apellido
                        </th>
                        <th scope="col" class="px-6 py-3">
                            DUI
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Telefono
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Usuario
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Estado
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tipo de usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Rol de usuario
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Socursal
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Accion
                        </th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $pdocn = Database::connect();
                    $sql = ('SELECT u.id, u.nombre, u.apellido, u.dui, u.numero_tel, u.correo, u.usuario, u.estado, u.rol,
                            t.tipo_usuario AS id_tipo,
                            s.nombre AS nombre_socursal,
                            u.id_socursal, u.fecha_creacion  
                                FROM usuario u
                                JOIN tipo_usuario t ON u.id_tipo = t.id
                                JOIN socursal s ON u.id_socursal = s.id
                                WHERE u.estado = "Espera de aprobacion" AND  u.id_tipo = "2" ORDER BY u.id DESC; ');
                    foreach ($pdocn->query($sql) as $row) {
                        echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <!-- Datos de cada usuario -->
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $row["id"] . '</td>
                                <td class="px-6 py-4">' . $row["nombre"] . '</td>
                                <td class="px-6 py-4">' . $row["apellido"] . '</td>
                                <td class="px-6 py-4">' . $row["dui"] . '</td>
                                <td class="px-6 py-4">' . $row["numero_tel"] . '</td>
                                <td class="px-6 py-4">' . $row["correo"] . '</td>
                                <td class="px-6 py-4">' . $row["usuario"] . '</td>
                                <td class="px-6 py-4">' . $row["estado"] . '</td>
                                <td class="px-6 py-4">' . $row["id_tipo"] . '</td>
                                <td class="px-6 py-4">' . $row["rol"] . '</td>
                                <td class="px-6 py-4">' . $row["id_socursal"] . '</td>
                                <td class="px-6 py-4">
                                    <form method="post">
                                        <!-- Botones para Aceptar y Rechazar -->
                                        <button type="submit" name="aceptar" value="' . $row["id"] . '" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Aceptar</button>
                                        <button type="submit" name="rechazar" value="' . $row["id"] . '" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Rechazar</button>
                                    </form>
                                </td>
                            </tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
<br>
<br>
<div class="container">
    <a href="gerente_banco.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver</button>
    </a>

</div>


<!--FUNCION BUSCADOR-->
<script>
    function buscar() {
        var texto = document.getElementById('simple-search').value.toLowerCase();
        var filas = document.querySelectorAll('tbody tr');
        for (var i = 0; i < filas.length; i++) {
            var fila = filas[i];
            var celdas = fila.querySelectorAll('td');
            var encontrado = false;
            for (var j = 0; j < celdas.length; j++) {
                var celda = celdas[j];
                if (celda.textContent.toLowerCase().includes(texto)) {
                    encontrado = true;
                    break;
                }
            }
            fila.style.display = encontrado ? 'table-row' : 'none';
        }
    }
    document.getElementById('simple-search').addEventListener('input', buscar);
</script>


<!--CUERPO DEL FOOTER-->

<footer class="bg-white rounded-lg shadow dark:bg-gray-900 m-4">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="img/logo1.png" class="h-12" alt="Flowbite Logo" />
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023
            <a href="https://flowbite.com/" class="hover:underline">Banco Agricultura</a>. All Rights Reserved.</span>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>