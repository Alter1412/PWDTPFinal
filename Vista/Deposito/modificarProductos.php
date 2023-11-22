<?php
include_once ("../../configuracion.php");
//recibe el idproducto
$datos = data_submitted();
$objProducto = new AbmProducto();
$buscarProducto = $objProducto->buscar($datos);
$producto = $buscarProducto[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="action/modificarProducto.php">
        Id: <input type="text" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto();?>' readonly ><br>
        Nombre Producto: <input type="text" name="pronombre" id="pronombre" value='<?php echo $producto->getProNombre();?>'><br>
        Precio: <input type="text" name="prodetalle" id="prodetalle" value='<?php echo $producto->getProDetalle();?>'>  <br>
        STOCK: <input type="text" name="procantstock" id="procantstock" value='<?php echo $producto->getProCantstock();?>'><br>
        Tipo: <input type="text" name="tipo" id="tipo" value='<?php echo $producto->getTipo();?>'><br>
        Imagen: <input type="text" name="imagenproducto" id="imagenproducto" value='<?php echo $producto->getImagenProducto();?>'><br>
        <input type="submit" value="Test">
    </form>
</body>
</html>