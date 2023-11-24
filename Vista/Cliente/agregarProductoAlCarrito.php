<?php
//Este es un formulario para actualizar al usuario 
//redirige a actualizarLogin.php
include_once('../../configuracion.php');
$tituloPagina = "Agregar Productos";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$datos = data_submitted();
$abmProducto = new AbmProducto;
$busquedaProducto = $abmProducto->buscar($datos);
//verEstructura($busquedaProducto);
$producto = $busquedaProducto[0];
//vamos ver que sucede desde la BD
?>

<body>

<div class="container mt-4">

<div class="row justify-content-center">
    <div class="col-md-6">
    <div class="card">
        <div class="card-header bg-dark text-white">
                <h4 class="mb-2 mt-2 text-center"><?php echo $producto->getProNombre();?></h4>
        </div>
        <div class="card-body">

    <form action="action/agregarProductosCarrito.php" method="post" class="row">
        <div class="col-md-6">
            <img class='card-img-top' style='height: 16rem; ' src='<?php echo $producto->getImagenProducto() ?>' alt="Product Image"><br>
        </div>
        <div class="col-md-6">
            <label for="idproducto">Codigo Producto:</label> <br>
            <input type="text" name="idproducto" id="idproducto" value='<?php echo $producto->getIdProducto();?>' readonly ><br>
            
            <label for="pronombre">Nombre Producto:</label> <br>
            <input type="text" id="pronombre" name="pronombre" value='<?php echo $producto->getProNombre();?>' readonly> <br>
            
            <label for="prodetalle">Precio Producto:</label> <br>
            <input type="text" id="prodetalle" name="prodetalle" value='<?php echo "$".$producto->getProDetalle();?>' readonly> <br>
            
            <label for="cicantidad">Stock:</label> <br>
            <input type="text" id="cicantidad" name="cicantidad" value='<?php echo $producto->getProCantstock();?>' readonly> <br>
            
            <label for="cantidad">Cantidad a llevar:</label> <br>
            <input type="text" id="cantidad" name="cantidad"> <br>
            <br>
            <input type="submit" class="btn btn-primary" value="Agregar al Carrito">
        </div>
    </form>
        </div></div></div></div></div>
</div>

<br>
</body>
</html>

<?php
include_once("../Estructuras/footer.php");
?>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<p>Como hacer para que se sumen los precios?</p>
    <form action="action/agregarProductosCarrito.php" method="post">
        <img class='card-img-top' style='height: 16rem;' src='<?php //echo $producto->getImagenProducto() ?>'><br>
        Id Producto: <input type="text" name="idproducto" id="idproducto" value='<?php //echo $producto->getIdProducto();?>' readonly><br>
        Nombre Producto: <input type="text" id="pronombre" name="pronombre" value='<?php //echo $producto->getProNombre();?>' readonly> <br>
        Precio Producto: <input type="text" id="prodetalle" name="prodetalle" value='<?php //echo $producto->getProDetalle();?>' readonly> <br>
        Stock: <input type="text" id="cicantidad" name="cicantidad" value='<?php //echo $producto->getProCantstock();?>' readonly> <br>
        Cantidad a llevar: <input type="text" id="cicantidad" name="cicantidad" > <br>
        
       
        <input type="submit"  value="Crear">
    </form>
</body>
</html> -->