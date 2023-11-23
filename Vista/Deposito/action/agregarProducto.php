<?php
include_once ("../../../configuracion.php");
//colocar en menu dinamico, no va un altaCompra.php
//tiene que recibir el idusario y cofecha(o seteamos la fecha en 0000-00-00 00:00:00 ?)
$datos = data_submitted();
verEstructura($datos);
//este array es de prueba. Cambiar el null por $datos['imagenproducto], que recibe la direccion de la imagen
$param['idproducto'] = 0;
$param['pronombre'] = $datos['pronombre'];
$param['prodetalle'] = $datos['prodetalle'];
$param['procantstock'] = $datos['procantstock'];
$param['tipo'] = $datos['tipo'];
$param['imagenproducto'] = $datos['imagenproducto'];
verEstructura($param);

$objProducto = new AbmProducto();
 $exito = $objProducto->alta($param);
if($exito){
    echo "Producto Creado";
}else{
    echo "Algo fallo";
}
header("Location: ../crearProductos.php");
?>