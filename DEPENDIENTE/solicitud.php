<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del usuario</title>
    <style>
.container {
    border-collapse: collapse;
    margin: auto;
}

.container, .container td {
    border: 1px solid #ddd;
}

.container td {
    padding: 8px;
}

.button {
    background-color: #a68a72;
    border: none;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
}
    </style>
</head>

    <body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $nombre = $_POST["nombre"];
    $dui = $_POST["dui"];
    $celular = $_POST["celular"];
    $correo = $_POST["correo"];
    $tipoCuenta = $_POST["cuenta"];
    $contraseña = $_POST["pass"];

    
}
?>
 <table class="container">
            <tr>
                <td class="label">Nombre:</td>
                <td class="data"><?php echo $nombre; ?></td>
            </tr>
            <tr>
                <td class="label">Documento de identificación (DUI):</td>
                <td class="data"><?php echo $dui; ?></td>
            </tr>
            <tr>
                <td class="label">Número de celular:</td>
                <td class="data"><?php echo $celular; ?></td>
            </tr>
            <tr>
                <td class="label">Correo electrónico:</td>
                <td class="data"><?php echo $correo; ?></td>
            </tr>
            <tr>
                <td class="label">Tipo de cuenta:</td>
                <td class="data"><?php echo $tipoCuenta; ?></td>
            </tr>
            <tr>
                <td class="label">Contraseña:</td>
                <td class="data"><?php echo $contraseña; ?></td>
            </tr>
        </table>
        <center>
        <div class="button-container">
            <a href="VLD.html" class="button">Ir a Transacciones</a>
        </div>
</center>

</body>
</html>
