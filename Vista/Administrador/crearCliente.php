<?php
/**
 * se crea un usario al cual se le puede asignar uno de os 3 roles principales
*/
 
include_once ('../../configuracion.php');
$datos = data_submitted();
$abmUsuario = new AbmUsuario();
$listaUsuario = $abmUsuario->buscar($datos);
$objUsuario = $listaUsuario[0];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action/altaCliente.php" method="post">
        NOMBRE: <input type="text" id="usnombre" name="usnombre" > <br>
        CONTRASEÑA: <input type="text" name="uspass" id="uspass" > <br> <!--Encriptar la nueva contraseña antes de enviarla -->
        E-MAIL: <input type="text" id="usmail" name="usmail" > <br>
        <input type="checkbox" name="Cliente" id="cliente" value="Cliente">Cliente
        <input type="checkbox" name="Deposito" id="deposito" value="Deposito">Deposito
        <input type="checkbox" name="Admin" id="admin" value="Administrador">Administrador
        <input type="submit"  value="Crear"> 
    </form>
</body>
</html>