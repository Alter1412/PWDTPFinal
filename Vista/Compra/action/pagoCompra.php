<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
verEstructura($datos);
$objCompra = new AbmCompra();
$arayCompra = $objCompra->buscar($datos);//array
$compra = $arayCompra[0];//objCompra
$fecha['cofecha'] = date('Y-m-d H:i:s');
$compraExitosa = $compra->modificar($fecha);
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
        $aux['isuduario'] = $compra->getObjUsuario()->getIdUsuario();
        $nuevaCompra->alta($aux);
        echo "Pago realizado";
    }else{
        echo "Algo fallo 2";
    }
}else{
    echo "Algo fallo";
}



?>