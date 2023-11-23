<?php 
include_once("../../../configuracion.php");
$datos = data_submitted();//Recibe idcompraitem = 0(por el autoincrement), idproducto, idcompra y cicantidad
 //verEstructura($datos);
 $session = new Session();
 $usuario = $session->getUsuario();
 //verEstructura($usuario);
 $idUsuario['idusuario'] = $usuario->getIdUsuario();
 $objCompra = new AbmCompra();
$busquedaCompra = $objCompra->buscar($idUsuario);
//verEstructura($busquedaCompra);
$compra = $busquedaCompra[0]; 
$producto['idcompraitem'] = 0;
$producto['idproducto'] = $datos['idproducto'];
$producto['idcompra'] = $compra->getIdCompra();
$producto['cicantidad'] = $datos['cantidad'];
//verEstructura($producto);
$objCompraItem = new AbmCompraItem();
$agregar = $objCompraItem->alta($producto);
if($agregar){
    header('Location:../productos.php');
}else{
    echo "Algo Fallo";
}
?>