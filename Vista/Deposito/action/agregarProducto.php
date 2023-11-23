<?php
include_once ("../../../configuracion.php");
//colocar en menu dinamico, no va un altaCompra.php
//tiene que recibir el idusario y cofecha(o seteamos la fecha en 0000-00-00 00:00:00 ?)
$datos = data_submitted();
verEstructura($datos);
$objProducto = new AbmProducto();
 $exito = $objProducto->agregarProducto($datos);
if($exito){
    echo "Producto Creado";
    header("Location: ../crearProductos.php");
}else{
    echo "Algo fallo";
}

//este array es de prueba. Cambiar el null por $datos['imagenproducto], que recibe la direccion de la imagen
/* $param['idproducto'] = 0;
$param['pronombre'] = $datos['pronombre'];
$param['prodetalle'] = $datos['prodetalle'];
$param['procantstock'] = $datos['procantstock'];
$param['tipo'] = $datos['tipo'];
$param['imagenproducto'] = $datos['imagenproducto'];
verEstructura($param); */
?>