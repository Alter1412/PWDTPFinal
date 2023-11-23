<?php
include_once "../../configuracion.php";
$tituloPagina = "Carrito";
$menu = "Carrito";
$direccion = " 	Cliente";
include_once("../Estructuras/headSeguro.php");
include_once("../Estructuras/banner.php");
include_once("../Estructuras/navSeguro.php");

$objCompra = new AbmCompra();
$busquedaCompra = $objCompra->buscarCarrito($_SESSION['idusuario']);
//verEstructura($busquedaCompra);
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
    if (count($listaCompraItem) > 0) {
        echo "<table class='table table-bordered'>";
        echo '<thead class="thead-dark"><tr><th scope="col">NOMBRE PRODUCTO</th><th scope="col">DETALLE PRODUCTO</th><th scope="col">CANTIDAD</th><th scope="col">OPCIONES</th></tr></thead><tbody>';
        for ($i = 0; $i < count($listaCompraItem); $i++) {
            $objCompraItem = $listaCompraItem[$i];
            $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
            $busquedaProducto = $objProducto->buscar($idProducto);
            $producto = $busquedaProducto[0];//objProducto
            
            echo '<tr>
              <td>' . $producto->getProNombre() . '</td>
              <td>' . $producto->getProDetalle() . '</td>
              <td>' . $objCompraItem->getCiCantidad() . '</td>
              <td><a href="action/quitarProductoCarrito.php?idcompraitem=' . $objCompraItem->getIdCompraItem() . '" class="btn btn-danger">Quitar Producto</a></td>
              </tr>';
        }
        echo "</tbody></table><br><br>";
        echo '<a href="action/pagoCompra.php?idusuario='.$_SESSION['idusuario'].'" class="btn btn-primary">Comprar</a>';
        
    } else {
        echo "<p class='alert alert-warning'>No se encontraron productos en el carrito.</p>";
    }
    ?>
</div>
<br>


</body>
</html>


<!-- <body>

<?php	/*

 if( count($listaCompraItem)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>CANTIDAD</td><td>OPCIONES</td></tr>';
    for($i=0;$i<count($listaCompraItem);$i++) {
        $objCompraItem = $listaCompraItem[$i];
        $idProducto['idproducto'] = $objCompraItem->getObjProducto()->getIdProducto();
        $busquedaProducto = $objProducto->buscar($idProducto);
        $producto = $busquedaProducto[0];//objProducto
        //verEstructura($objProducto);
       
        
        
    echo '<tr>
              <td>'.$producto->getProNombre().'</td>
              <td>'.$producto->getProDetalle().'</td>
              <td>'.$objCompraItem->getCiCantidad().'</td>
              <td><a href="action/quitarProductoCarrito.php?idcompraitem='.$objCompraItem->getIdCompraItem().'">Quitar Producto</a> 
      </td>
              </tr>';
	}
    echo "</table><br><br><br>";
    echo "<a href='../altaCompra.php'>Comprar</a>";
    
}else{
    echo "No se encontraron Productos";
}
*/
?>

</body>
</html> -->

<?php
include_once("../Estructuras/footer.php");
?>