<?php
include_once ("../../../configuracion.php");
//colocar en menu dinamico, no va un altaCompra.php
//tiene que recibir el idusario y cofecha(o seteamos la fecha en 0000-00-00 00:00:00 ?)
$datos = data_submitted();
verEstructura($datos);
/* $param['idproducto'] = $datos['idproducto'];
$param['pronombre'] = $datos['pronombre'];
$param['prodetalle'] = $datos['prodetalle'];
$param['procantstock'] = $datos['procantstock'];
$param['tipo'] = $datos['tipo'];
$param['imagenproducto'] = $datos['imagenproducto'];
verEstructura($param); */

$objProducto = new AbmProducto();
 $exito = $objProducto->modificar($datos);
if($exito){
    //header("Location: ../gestionarProductos.php");
    echo "Producto modificado";
}else{
    echo "Algo fallo";
}


?>