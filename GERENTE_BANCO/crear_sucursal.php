<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Crear Sucursal</title>
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
                        <a href="acciones_gerente.php" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Acciones</a>
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
        <h1 class="mb-4 text-3xl font-extrabold text-gray-900 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Bienvenido </span></h1>

    </div>

    <hr>
    <hr>
    <br>
    <br>


    <!-- FORMULARIO -->

    <div class="container">

        <form class="max-w-sm mx-auto" method="POST" action="crear_sucursal.php">

            <h2 class="text-4xl font-extrabold dark:text-white">Ingresa una nueva sucursal</h2>
            <br>

            <div class="container">

            </div>
            <div class="mb-5">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de Sucursal</label>
                <input type="text" id="nombre" name="nombre" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Ingresa tu nombre" required />
            </div>
            <label for="municipio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Municipio</label>
            <select id="municipio" name="municipio" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option>San Salvador</option>
                <option>San Miguel</option>
                <option>Sonsonate</option>
                <option>Ahuachapan</option>
                <option>Chalatenango</option>
                <option>Morazan</option>
                <option>La Union</option>
                <option>La Paz</option>
                <option>La Libertad</option>
            </select>
            <br>
            <label for="gerente" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gerente de Sucursal</label>
            <select id="gerente" name="gerente" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php
                include '../connection.php';

                $cn = Database::connect();
                $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $query = $cn->prepare("SELECT id, nombre, apellido FROM usuario WHERE rol = 'Gerente banco'");
                $query->execute();

                while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value=\"" . $row['id'] . "\">" . $row['nombre'] . " " . $row['apellido'] . "</option>";
                }

                Database::disconnect();
                ?>
            </select>
            <br>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Crear Sucursal</button>
        </form>

    </div>

    <div class="container">
        <a href="gerente_banco.php" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Volver</button> </a>

    </div>



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


<?php

$estado1 = "Espera de aprobacion";
$id_socursal1 = 1;
$id_tipo = 2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $datos = array_map('trim', $_POST);
    if (empty($datos['nombre'])) {
        echo "El campo 'Nombre de Sucursal' es obligatorio";
    } elseif (in_array('', $datos)) {
        echo "Todos los campos son requeridos";
    } else {
        $cn = Database::connect();
        $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $cn->prepare("INSERT INTO socursal(nombre, municipio, gerente) VALUES(?, ?, ?)");
        $query->execute(array($datos['nombre'], $datos['municipio'], $datos['gerente']));
        Database::disconnect();
        echo "La Sucursal ha sido creada exitosamente";
    }
}
?>