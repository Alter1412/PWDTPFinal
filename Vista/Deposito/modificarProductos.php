<?php
include_once("../../configuracion.php");
$tituloPagina = "Gestionar Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");
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
    <title>Modificar Producto</title>
   

</head>
<body>
    <div class="container mt-4">
        <form action="action/modificarProducto.php">
            <div class="form-group">
                <label for="idproducto">Id:</label>
                <input type="text" class="form-control" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto(); ?>' readonly>
            </div>
            <div class="form-group">
                <label for="pronombre">Nombre Producto:</label>
                <input type="text" class="form-control" name="pronombre" id="pronombre" value='<?php echo $producto->getProNombre(); ?>'>
            </div>
            <div class="form-group">
                <label for="prodetalle">Precio:</label>
                <input type="text" class="form-control" name="prodetalle" id="prodetalle" value='<?php echo $producto->getProDetalle(); ?>'>
            </div>
            <div class="form-group">
                <label for="procantstock">STOCK:</label>
                <input type="text" class="form-control" name="procantstock" id="procantstock" value='<?php echo $producto->getProCantstock(); ?>'>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo:</label>
                <input type="text" class="form-control" name="tipo" id="tipo" value='<?php echo $producto->getTipo(); ?>'>
            </div>
            <div class="form-group">
                <label for="imagenproducto">Imagen:</label>
                <input type="text" class="form-control" name="imagenproducto" id="imagenproducto" value='<?php echo $producto->getImagenProducto(); ?>'>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Modificar Producto</button>
        </form>
    </div>
<br>
  
</body>
</html>
<?php
include_once("../Estructuras/footer.php");
?>

