<?php 
include_once("../../../configuracion.php");
$datos = data_submitted();

$objAbmProducto = new AbmProducto();
$resultado = $objAbmProducto->VerificarStock();

if($resultado){
   //header('Location:../productos.php');
   $respuesta = array("resultado" => "exito", "mensaje" => "Agregado al carrito con éxito");
}else{
    $respuesta = array("resultado" => "error", "mensaje" => "Error, no se pudo agregar al carrito");
}

echo json_encode($respuesta);
?>