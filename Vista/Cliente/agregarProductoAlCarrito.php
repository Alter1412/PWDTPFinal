<?php
/**Este es un formulario para actualizar al usuario 
 * redirige a actualizarLogin.php
*/
 
include_once ('../../configuracion.php');
$datos = data_submitted();
$abmProducto = new AbmProducto;
$busquedaProducto = $abmProducto->buscar($datos);
verEstructura($busquedaProducto);
$producto = $busquedaProducto[0];
//vamos ver que sucede desde la BD



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Como hacer para que se sumen los precios?</p>
    <form action="action/agregarProductosCarrito.php" method="post">

        Id Producto: <input type="text" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto();?>' readonly><br>
        Nombre Producto: <input type="text" id="pronombre" name="pronombre" value='<?php echo $producto->getProNombre();?>' readonly> <br>
        Precio Producto: <input type="text" id="prodetalle" name="prodetalle" value='<?php echo $producto->getProDetalle();?>' readonly> <br>
        Stock: <input type="text" id="cicantidad" name="cicantidad" value='<?php echo $producto->getProCantstock();?>' readonly> <br>
        Cantidad a llevar: <input type="text" id="cicantidad" name="cicantidad" > <br>
        
       
        <input type="submit"  value="Crear">
    </form>
</body>
</html>