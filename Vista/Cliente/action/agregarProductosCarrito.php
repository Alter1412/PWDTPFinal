<?php 
include_once("../../../configuracion.php");
$datos = data_submitted();//Recibe idcompraitem = 0(por el autoincrement), idproducto, idcompra y cicantidad
$session = new Session();
$datos['idusuario'] = $session->getIdUsuario(); 
//verEstructura($datos);

$objCompraItem = new AbmCompraItem();
$agregar = $objCompraItem->agregarProductoCarrito($datos);

if($agregar){
   header('Location:../productos.php');
}else{
    echo "Algo Fallo";
}

//verEstructura($datos);
 /* $session = new Session();
 $usuario = $session->getUsuario();
 //verEstructura($usuario);
 
 $objCompra = new AbmCompra();
$busquedaCompra = $objCompra->buscarCarrito($datos);
//verEstructura($busquedaCompra);
$compra = $busquedaCompra[0]; 
$producto['idcompraitem'] = 0;
$producto['idproducto'] = $datos['idproducto'];
$producto['idcompra'] = $compra->getIdCompra();
$producto['cicantidad'] = $datos['cantidad'];
//verEstructura($producto); */
?>