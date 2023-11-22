<?php
include_once "../../configuracion.php";
$datos = data_submitted();//idCompra
//verEstructura($datos);
$idUCompra ['idcompra'] =  6; //esto es de prueba
$objCompraItem = new AbmCompraItem();
$objProducto = new AbmProducto();
/**
 * Desde aqui se listan los productos del carrito
 */

$listaCompraItem = $objCompraItem->buscar($idUCompra);
//verEstructura($listaCompraItem);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php	

 if( count($listaCompraItem)>0){
    echo "<table border='1'>";//por el momento no muestro la password, no tiene sentido
    echo '<tr><td>NOMBRE PRODUCTO</td><td>DETALLE PRODUCTO</td><td>STOCK</td><td>OPCIONES</td></tr>';
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
    //echo "<a href='crearCliente.php'>Crear Usuario Nuevo</a>";
    
}else{
    echo "No se encontraron Productos";
}

?>

</body>
</html>