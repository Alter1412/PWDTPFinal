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
                                <img class='card-img-top' style='height: 16rem; ' src='<?php echo $producto->getImagenProducto(); ?>' alt="Product Image">
                            </div>
                            <div class="col-md-6">
                                <label for="idproducto">Codigo Producto:</label>
                                <input type="text" name="idproducto" id="idproducto" class="form-control w-100" value='<?php echo $producto->getIdProducto(); ?>' readonly>

                                <label for="pronombre">Nombre Producto:</label>
                                <input type="text" id="pronombre" name="pronombre" class="form-control w-100" value='<?php echo $producto->getProNombre(); ?>' readonly>

                                <label for="prodetalle">Precio Producto:</label>
                                <input type="text" id="prodetalle" name="prodetalle" class="form-control w-100" value='<?php echo "$" . $producto->getProDetalle(); ?>' readonly>

                                <label for="cicantidad">Stock:</label>
                                <input type="text" id="cicantidad" name="cicantidad" class="form-control w-100" value='<?php echo $producto->getProCantstock(); ?>' readonly>

                                <div class="contenedor-dato form-group">
                                    <label for="cantidad">Cantidad a llevar:</label>
                                    <input type="text" id="cantidad" name="cantidad" class="form-control w-100">
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