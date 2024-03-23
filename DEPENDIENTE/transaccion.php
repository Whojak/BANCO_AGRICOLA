<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la transacción</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
table {
    margin: auto; /* Centra la tabla horizontalmente */
    border-collapse: collapse;
    width: 50%; /* Ancho de la tabla */
}

th, td {
    border: 1px solid #dddddd; /* Borde de las celdas */
    text-align: left;
    padding: 8px; /* Espaciado interno de las celdas */
}

th {
    background-color: #f2f2f2; /* Color de fondo de las celdas de encabezado */
}

#franja {
            background-color: #a68a72;
            height: 60px;
            width: 100%;
        }
</style>
</head>
<body>
    <CEnter>
<div id="franja"><h1>Banco de Agricultura Salvadoreño SA de CV</h1> 
</CEnter>
<button id="boton-volver" class="btn btn-outline-dark" onclick="window.location.href = 'VLD.html';">Volver</button>

<?php
   
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $dui = $_POST["dui"];
        $monto = $_POST["monto"];
        
    ?>
    <table>
        <tr>
            <th colspan="2">Resultado de la transacción</th>
        </tr>
      
        <tr>
            <td>Número de DUI:</td>
            <td><?php echo $dui; ?></td>
        </tr>
        <tr>
            <td>Monto:</td>
            <td><?php echo $monto; ?> dólares</td>
        </tr>
    </table>
    <?php
    } else {
        echo "<p>No se han recibido datos del formulario.</p>";
    }
    ?>
</body>
</html>