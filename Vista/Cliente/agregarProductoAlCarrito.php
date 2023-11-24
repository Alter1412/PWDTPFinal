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

    <div class="container mt-4 mb-4">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h4 class="mb-2 mt-2 text-center"><?php echo $producto->getProNombre(); ?></h4>
                    </div>
                    <div class="card-body">

                    <!-- Zona de alerta -->
                    <div id="alertaMensajes">
                    </div>

                        <form name="formAgregarProducto" id="formAgregarProducto" method="POST" class="row needs-validation">
                            <div class="col-md-6">
                                <img class='card-img-top' style='height: 16rem; ' src='<?php echo $producto->getImagenProducto(); ?>' alt="Product Image"><br>
                            </div>
                            <div class="col-md-6">
                                <label for="idproducto">Codigo Producto:</label> <br>
                                <input type="text" name="idproducto" id="idproducto" class="w-100" value='<?php echo $producto->getIdProducto(); ?>' readonly><br>

                                <label for="pronombre">Nombre Producto:</label> <br>
                                <input type="text" id="pronombre" name="pronombre" class="w-100" value='<?php echo $producto->getProNombre(); ?>' readonly> <br>

                                <label for="prodetalle">Precio Producto:</label> <br>
                                <input type="text" id="prodetalle" name="prodetalle" class="w-100" value='<?php echo "$" . $producto->getProDetalle(); ?>' readonly> <br>

                                <label for="cicantidad">Stock:</label> <br>
                                <input type="text" id="cicantidad" name="cicantidad" class="w-100" value='<?php echo $producto->getProCantstock(); ?>' readonly> <br>

                                <div class="contenedor-dato">
                                    <label for="cantidad">Cantidad a llevar:</label> <br>
                                    <input type="text" id="cantidad" name="cantidad" class="w-100"> <br>
                                </div>
                                <input type="submit" class="btn btn-primary mt-3 w-100" value="Agregar al Carrito">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../js/validarProductoCarrito.js"></script>
<?php
include_once("../Estructuras/footer.php");
?>