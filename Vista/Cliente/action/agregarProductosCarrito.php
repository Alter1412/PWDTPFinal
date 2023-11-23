<?php 
include_once("../../../configuracion.php");
$datos = data_submitted();//Recibe idcompraitem = 0(por el autoincrement), idproducto, idcompra y cicantidad
 verEstructura($datos);
$producto['idcompraitem'] = 0;
$producto['idproducto'] = $datos['idproducto'];
$producto['idcompra'] = 6;//Esto es de prubea. Ver como se recibe
$producto['cicantidad'] = $datos['cicantidad'];
verEstructura($producto);
$objCompraItem = new AbmCompraItem();
$agregar = $objCompraItem->alta($producto);
if($agregar){
    echo "Item Agregado";
}else{
    echo "Algo Fallo";
}
?>