<?php
include_once("../../configuracion.php");
$tituloPagina = "Carrito";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$idUsuario = $session->getIdUsuario();
$objCompra = new AbmCompra();
$busquedaCompra = $objCompra->buscarCarrito($idUsuario);
//verEstructura($busquedaCompra);

if($busquedaCompra == null){

$objAbmNuevaCompra = new AbmCompra();
$paramCompra['idcompra'] = 0;
$paramCompra['cofecha'] = '0000-00-00 00:00:00';
$paramCompra['idusuario'] = $idUsuario;
$objAbmNuevaCompra->alta($paramCompra);

$busquedaCompra = $objAbmNuevaCompra->buscarCarrito($idUsuario);
}

$compra = $busquedaCompra[0]; 
//verEstructura($datos);
$idUCompra ['idcompra'] = $compra->getIdCompra(); 
//print_r($idUCompra);
$objCompraItem = new AbmCompraItem();
$objProducto = new AbmProducto();
/**
 * Desde aqui se listan los productos del carrito
 */

$listaCompraItem = $objCompraItem->buscar($idUCompra);
//verEstructura($listaCompraItem);
?>

<body>

<div class="container mt-4">
    <?php
    $montoAPagar = 0;
    if (count($listaCompraItem) > 0) {
        echo "<table class='table table-bordered'>";
        echo '<thead class="thead-dark"><tr><th scope="col">IMAGEN</th><th scope="col">NOMBRE PRODUCTO</th><th scope="col">DETALLE PRODUCTO</th><th scope="col">CANTIDAD</th><th scope="col">OPCIONES</th></tr></thead><tbody>';
        for ($i = 0; $i < count($listaCompraItem); $i++) {
            $objCompraItem = $listaCompraItem[$i];
            $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
            $busquedaProducto = $objProducto->buscar($idProducto);
            $producto = $busquedaProducto[0];//objProducto
            $montoAPagar = $montoAPagar + ($producto->getProDetalle() *  $objCompraItem->getCiCantidad());
            echo '<tr>
              <td><img src=' . $producto->getImagenProducto() . ' width="100px"></td>
              <td>' . $producto->getProNombre() . '</td>
              <td>' . $producto->getProDetalle() . '</td>
              <td>' . $objCompraItem->getCiCantidad() . '</td>
              <td><a href="action/quitarProductoCarrito.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-danger">Quitar Producto</a></td>
              </tr>';
        }
        echo "Monto a Pagar: $".$montoAPagar."<br>";
        echo "</tbody></table><br><br>";
        echo '<a href="action/pagoCompra.php?idusuario='.$idUsuario.'" class="btn btn-primary">Comprar</a>';
        
    } else {

        echo '<div class="container mt-5 mb-5">';
        echo '<div class="row justify-content-center">';
        echo '<div class="col-md-6">';
        echo '<div class="card p-5">';
        echo "<p class='alert alert-warning'>No tiene productos en su carrito.</p>";
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
    ?>
</div>
<br>


</body>
</html>


<?php
include_once("../Estructuras/footer.php");
?>