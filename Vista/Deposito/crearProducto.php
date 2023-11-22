<?php
include_once ("../../configuracion.php");
//la tabla producto tiene autoincrement
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action/agregarProducto.php">
        Nombre Producto: <input type="text" name="pronombre" id="pronombre"><br>
        Precio: <input type="text" name="prodetalle" id="prodetalle"><br>
        STOCK: <input type="text" name="procantstock" id="procantstock"><br>
        Tipo: <input type="text" name="tipo" id="tipo"><br>
        Imagen: <input type="text" name="imagenproducto" id="imagenproducto"><br>
        <input type="submit" value="Test">
    </form>
</body>
</html>