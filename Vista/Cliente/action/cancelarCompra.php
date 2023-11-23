<?php
include_once ("../../../configuracion.php");
//pasa el carrito al estado iniciada
$datos = data_submitted();//idCompra
verEstructura($datos);

    $objEstado = new AbmCompraEstado();
    $param['idcompra'] = $datos;
    $param['idcompraestadotipo'] = 1;
    $param['cefechafin'] = null;
    $exito = $objEstado->buscar($param);

    if($exito){
        $cambioRealizado = $objEstado->cancelarCompra($exito);
        if($cambioRealizado){
            header('Location: ../misCompras.php');
            echo "cancelacion realizada";
        }
        
    }else{
        echo "Algo fallo";
    }

/* $objCompra = new AbmCompra();
$arayCompra = $objCompra->buscar($datos);//array
$compra = $arayCompra[0];//objCompra */


?>