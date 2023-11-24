<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos= data_submitted();//idusuario
verEstructura($datos);
$obj = new AbmCompraEstado();
$resp = $obj->pagarCompra($datos['idusuario']);

if($resp){
    header('Location: ../misCompras.php');
    //echo "se creo compra";
}else{
    echo "Compra no realizada";
}

/* $objCompra = new AbmCompra();
$arayCompra = $objCompra->buscarCarrito();//array
//verEstructura($arayCompra);
$compra = $arayCompra[0];//objCompra
//verEstructura($compra);
 $fecha['idcompra'] = $compra->getIdCompra();
$fecha['cofecha'] = date('Y-m-d H:i:s');
$fecha['idusuario'] = $compra->getObjUsuario()->getIdUsuario();
verEstructura($fecha);
$compraExitosa = $objCompra->modificar($fecha);
$ItemComprados = new AbmCompraItem();
$idCompra['idcompra'] = $fecha['idcompra'];
$listaItems = $ItemComprados->buscar($idCompra);
verEstructura($listaItems);
$objProducto = new AbmProducto();
//se modifica el stock en a base de datos
for ($i = 0; $i < count($listaItems); $i++){
    $idUnItem['idproducto'] = $listaItems[$i]->getObjProducto()->getIdProducto();//id del item a comprar
    //echo $idUnItem."<br>";
    $productoGondola = $objProducto->buscar($idUnItem);
    verEstructura($productoGondola);
    $cantLlevar = $listaItems[$i]->getCiCantidad();
    $stockGondola = $productoGondola[0]->getProCantstock();
    $nuevoStock = $stockGondola - $cantLlevar;
    $datosProductos['idproducto'] = $productoGondola[0]->getIdProducto();
    $datosProductos['pronombre'] = $productoGondola[0]->getProNombre();
    $datosProductos['prodetalle'] = $productoGondola[0]->getProDetalle();
    $datosProductos['procantstock'] = $nuevoStock;
    $datosProductos['tipo'] = $productoGondola[0]->getTipo();
    $datosProductos['imagenproducto'] = $productoGondola[0]->getImagenProducto();
    $objProducto->modificar($datosProductos);
}

if($compraExitosa){
    $objEstado = new AbmCompraEstado();
    $param['idcompraestado'] = 0;
    $param['idcompra'] = $compra->getIdCompra();
    $param['idcompraestadotipo'] = 1;
    $param['cefechaini'] = date('Y-m-d H:i:s');
    $param['cefechafin'] = null;
    $exito = $objEstado->alta($param);
    if($exito){
        $nuevaCompra = new AbmCompra();
        $aux['idcompra'] = 0;
        $aux['cofecha'] = null;
        $aux['idusuario'] = $datos['idusuario'];
        $nuevaCompra->alta($aux);
        header('Location: ../misCompras.php');
        echo "se creo compra";
    }else{
        echo "Algo fallo 2";
    }
}else{
    echo "Algo fallo";
}
 */


?>