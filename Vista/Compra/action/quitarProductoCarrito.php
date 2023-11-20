<?php 
include_once("../../../configuracion.php");
$datos = data_submitted();//Recibe idcompraitem = 0(por el autoincrement), idproducto, idcompra y cicantidad

$objCompraItem = new AbmCompraItem();
$agregar = $objCompraItem->baja($datos);
if($agregar){
    echo "Item Borrado del Carrito";
}else{
    echo "Algo Fallo";
}
?>